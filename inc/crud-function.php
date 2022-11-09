<?php

defined( 'ABSPATH' ) || exit; // Prevent direct access


// ************** General crud functions ************** //

// Insert data function  
function jiali_insert( $params ) 
{
    // Hint >> params : table_name , col_arr , col_format_arr ;
    
    global $wpdb;

    // Get db name
    $table = $wpdb ->prefix . $params['table_name'];

    // Get query result
    $result =  $wpdb->insert(

        $table,

        // Notice that $col_arr and $col_format_arr must be in same size

        $params['col_arr'], // Associative array that it's members depending on table is same as : 'title' => 'aabgine'

        $params['col_format_arr'] // Indexed array that it's members is same as : '%s' 

    );

    // Check errors
    if ( is_wp_error($result) )
        return $result;

    // Empty result error
    if( empty($result) )  
        return new WP_Error( "No_data_saved", __( "No data saved", "aabgine" ) );

    return $wpdb->insert_id;

}

// Insert multiple values function  
function jiali_insert_multiple_value( $params ) 
{
    
    global $wpdb;

    // Get db name
    $table = $wpdb -> prefix . $params['table_name'];

    // Query
    $query = "INSERT INTO $table";

    $query .= "(" .implode(', ', $params['col_arr']) . ") VALUES "; // $col_arr is a indexed array

    // Values for safe query
    $values = [];

    // Count $values array
    $count_array = count($params['values_arr']);
    $i = 0;

    // Format repetition
    foreach( $params['values_arr'] as $index => $val )
    {
        $query .=  "("  .implode(', ', $params['col_format_arr']) . ")" ;

        // Check for last index
        $query .= ++$i === $count_array ? ";" : ",";

        foreach ( $val as $v )
        {
            
            array_push( $values, $v) ;
        
        }

    }

    // Safe query
    $safequery = $wpdb->prepare( $query , $values );

    // Run query
    $result = $wpdb->query($safequery);

    // Empty result error
    if( empty($result) )  
        return new WP_Error( "No_data_saved", __( "No data saved", "aabgine" ) );

    return $result;

}

// Update data function  
function jiali_update( $params ) 
{
    
    global $wpdb;

    // Get db name
    $table = $wpdb -> prefix . $params['table_name'];

    if ( empty($params['where_col_arr']) || !is_array( $params['where_col_arr'] ))
        return new WP_Error( "no_condition_for_update", __( "There is no condition for the update", "aabgine" ) );

    // Get query result
    $result =  $wpdb->update(

        $table,

        // Notice that $col_arr / $where_col_arr and $col_format_arr / $where_col_format_arr must be in same size
        
        $params['col_arr'], // Associative array that it's members is same as : 'title' => 'aabgine'

        $params['where_col_arr'], // Associative array that it's members depending on table is same as : 'title' => 'aabgine'

        $params['col_format_arr'], // Indexed array that it's members is same as : '%s' 

        $params['where_col_format_arr'] // Indexed array that it's members is same as : '%s' 

    );
    
    // Empty result error
    if( empty($result) )  
        return new WP_Error( "No_data_updated", __( "No data updated", "aabgine" ) );

    return $result;

}

// Delete data function  
function jiali_delete( $params ) 
{
    // Hint >> params : table_name , where_col_arr , col_format_arr ;
    
    global $wpdb;

    // Get db name
    $table = $wpdb -> prefix . $params['table_name'];

    if ( empty($params['where_col_arr']) || !is_array( $params['where_col_arr'] ) )
        return new WP_Error( "no_condition_for_delete", __( "There is no condition for the delete", "aabgine" ) );

    // Get query result
    $result = $wpdb->delete(

        $table,
    
        // Notice that $col_arr and $col_format_arr must be in same size

        $params['where_col_arr'], // Associative array that it's members depending on table is same as : 'title' => 'aabgine' 

        $params['col_format_arr'] // Indexed array that it's members is same as : '%s'

    );

    // Empty result error
    if( empty($result) )  
        return new WP_Error( "No_data_deleted", __( "No data deleted", "aabgine" ) );

    return $result;

}

// Delete data function for array meta values
function jiali_delete_for_array_meta_values( $params )
{
    // Hint >> params : table_name , from_col , where_col_arr , variables_arr, limit = null , offset = null, orderby = null, order = null, format = false);
    global $wpdb;

    // Get db name
    $table = $wpdb ->prefix . $params['table_name'];

    // Query 
    $query = "DELETE FROM {$table}" ; 

    if ( empty($params['where_col_arr']) || !is_array( $params['where_col_arr'] ))
        return new WP_Error( "no_condition_for_delete", __( "There is no condition for the delete", "aabgine" ) );

    $query .= " WHERE " ;

    $values_arr = array();
    
    foreach( $params['where_col_arr'] as $key => $item )
    {

        if( is_array( $item['val'] ) && !empty( $item['val'] ) )
        {
            // Set format %d, %f, %s
            if( $item['format'] )
            {

                $format =  '(' .  implode( "," , array_fill( 0, count($item['val']), $item['format']) ). ')';

            } else {

                $format = '(' ;

                foreach( $item['val'] as $k => $v )
                {
                    if( gettype( $item['val'] ) == 'string' )
                        $format .= '%s';
                    else if( gettype( $item['val'] ) == 'integer' )  
                        $format .= '%d';
                    else 
                        $format .= '%f';

                    if( count($item['val']) > $k + 1 )
                        $format .= ',';

                }

                $format .= ')' ;
            }
            
            // Set operation 
            $operation = $item['operation'] ? $item['operation'] : 'IN' ;

            // Set relation
            $relation = ( count($params['where_col_arr']) > 1 && count($params['where_col_arr']) > $key + 1 ) ? ( $item['relation'] ? $item['relation'] : ' AND ') : '';

            $query .= ' ' . $item['key'] . ' ' . $operation . ' ' . $format . ' ' . $relation ;

            // Add values
            $values_arr = array_merge( $values_arr , $item['val'] );

        } else
        {
            // Set format %d, %f, %s
            $format = $item['format'] ? $item['format'] : ( gettype( $item['val'] ) == 'string' ? '%s' : ( gettype( $item['val'] ) == 'integer' ? '%d' : '%f' ) ) ;
            
            // Set operation 
            $operation = $item['operation'] ? $item['operation'] : '=' ;

            // Set relation
            $relation = ( count($params['where_col_arr']) > 1 && count($params['where_col_arr']) > $key + 1 ) ? ( $item['relation'] ? $item['relation'] : ' AND ') : '';

            $query .= ' ' . $item['key'] . ' ' . $operation . ' ' . $format . ' ' . $relation ;

            // Add values
            $values_arr[] = $item['val'];
        }
    }

    // Set safe query. Example : $wpdb -> prepare(" SELECT * FROM title = '%s' ", $variables_arr );
    $safequery = $wpdb->prepare(" $query ", $values_arr ); // $variables_arr is array of variables

    $result = $wpdb->get_results($safequery);

    // Empty result error
    if( empty($result) )  
        return new WP_Error( "No_data_deleted", __( "No data deleted", "aabgine" ) );

    return $result;
   
}

// Read data function
function jiali_read( $params )
{
    // Hint >> params : table_name , from_col , where_col , variables_arr, limit = null , offset = null, orderby = null, order = null, format = false);
    global $wpdb;

    // Get db name
    $table = $wpdb ->prefix . $params['table_name'];

    // Set default from_col as *
    if (empty($params['from_col']))
        $params['from_col'] = '*';

    // Query 
    $query = "SELECT {$params['from_col']} FROM {$table}" ; // $from_col is string as : '*' or 'id, title'

    if ( !empty($params['where_col']) ) // $where_col is string as : ' title like "%s" OR id = "%d" '
        $query .= " WHERE {$params['where_col']}" ;
    
    if ( $params['orderby'] != null && $params['order'] != null  )
    {
        $query .= ' ORDER BY ' . $params['orderby'];

        $query .= ' ' . $params['order'];
    }    

    if ( $params['limit'] != null )
    {
        $query .= ' LIMIT %d';

        $params['variables_arr'][] =  $params['limit'];
    }
    
    if ( $params['offset'] != null )
    {
        $query .= ' OFFSET %d';

        $params['variables_arr'][] =  $params['offset'];
    }       

    // Set safe query. Example : $wpdb -> prepare(" SELECT * FROM title = '%s' ", $variables_arr );
    $safequery = $wpdb->prepare(" $query ", !empty($params['variables_arr']) ? $params['variables_arr'] : array() ); // $variables_arr is array of variables

    if ($params['format'])
    {
        $result = $wpdb->get_results($safequery , $params['format']);
    } else 
    {
        $result = $wpdb->get_results($safequery);
    }

    if( empty($result) || !is_array($result) )
        return new WP_Error( "no_data_found", __( "No data found", "aabgine" ) );

    return $result;
}

// Read data function
function jiali_read_col( $params )
{
    // Hint >> params : table_name , from_col , where_col , variables_arr, limit = null , offset = null, orderby = null, order = null, format = false);
    global $wpdb;

    // Get db name
    $table = $wpdb ->prefix . $params['table_name'];

    // Query 
    $query = "SELECT {$params['field_name']} FROM {$table}" ; // $from_col is string as : '*' or 'id, title'

    if ( !empty($params['where_col']) ) // $where_col is string as : ' title like "%s" OR id = "%d" '
        $query .= " WHERE {$params['where_col']}" ;
    
    if ( $params['orderby'] != null && $params['order'] != null  )
    {
        $query .= ' ORDER BY ' . $params['orderby'];

        $query .= ' ' . $params['order'];
    }    

    if ( $params['limit'] != null )
    {
        $query .= ' LIMIT %d';

        $params['variables_arr'][] =  $params['limit'];
                
    }
    
    if ( $params['offset'] != null )
    {
        $query .= ' OFFSET %d';

        $params['variables_arr'][] =  $params['offset'];
    }       

    $safequery = $wpdb->prepare( " $query ", !empty($params['variables_arr']) ? $params['variables_arr'] : array() );

    $result = $wpdb->get_col( $safequery );

    if( empty($result) || !is_array($result) )
        return new WP_Error( "no_data_found", __( "No data found", "aabgine" ) );

    return $result;
}

// Count data function
function jiali_count( $params )
{
    global $wpdb;

    // Get db name
    $table = $wpdb -> prefix . $params['table_name'];

    // Set default from_col as *
    if (empty($params['from_col']))
        $params['from_col'] = '*';

    // Query 
    $query = "SELECT COUNT( {$params['from_col']} ) FROM {$table}" ; // $from_col is string as : '*' or 'id, title'

    if ( $params['where_col'] != '' ) // $where_col is string as : ' title like "%s" OR id = "%d" '
        $query .= " WHERE {$params['where_col']}" ;

    // Set safe query. Example : $wpdb -> prepare(" SELECT * FROM title = '%s' ", $variables_arr );

    $safequery = $wpdb -> prepare(" $query ", $params['variables_arr'] ); // $variables_arr is array of variables

    $result = $wpdb -> get_var($safequery);
    
    return intval($result);

}

 // Custom query function
function jiali_custom_query($query, $need_results = false)
{
   global $wpdb;

   if ($need_results)
   {
       // run query
       $result = $wpdb->get_results( $query ); // $query is string
    } else {
        // run query
        $result = $wpdb->query( $query ); // $query is string
   }


   if( empty($result))
        return new WP_Error( "no_data_found", __( "No data found", "aabgine" ) );

   return $result;
}