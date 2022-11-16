jQuery(document).ready(function ($) {

	var paged = 1;
	// Sample ajax call	
	$('#jiali-load-more-articles').on('click', function() 
	{
		Notiflix.Loading.pulse();

		paged++;

        // Get nonce
		var nonce = $("#jiali-nonce-blog").val();

		$.ajaxSetup({cache: false});
		
		$.ajax({

			type: 'POST',

			url: jiali_ajaxhandler.ajaxurl,

			data: {

				action: 'jiali_load_more_articles_ajax',

				nonce : nonce,

				paged : paged
					
			},
			
			success: function (data) {

				Notiflix.Loading.remove();

				var arr = $.parseJSON(data);

                if (arr.data) 
                {
					if( arr.is_finished)
						$('#jiali-load-more-articles').closest('.jiali-more-articles').fadeOut();
						
						var args = {
							template : 'vertical',
							thumbnail : true,
							thumbnailSize : 'medium',
							title : true,
							excerpt : false,
							author : true,
							date : true,
							views : true,
							tags : true,
							linked : true,
							tags : true
						}
						console.log(arr.data)
						var newPosts = '';
						arr.data.forEach(function(item) {
							args.post = item;
							newPosts += `<div class="col-md-3"> ${jiali_post_item_template(args)} </div>`;
						});

						$('.jiali-posts-wrapper .jiali-posts-items').append(newPosts);
                } else
                {
                    Notiflix.Notify.failure(arr.message);
                }	
		
			},
			
			error: function (MLHttpRequest, textStatus, errorThrown) {
            
				Notiflix.Loading.remove();

                if (errorThrown)
                {
                    Notiflix.Notify.failure(errorThrown);

                } else {

                    Notiflix.Notify.failure('Unknown error!');
                }
                
			}
		});

	});    
    
});

