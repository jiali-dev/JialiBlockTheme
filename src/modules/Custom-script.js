jQuery(document).ready(function ($) {

    window.jiali_trim_content = function( string, number )
    {
        return  string
        .split(' ', number) //create array of the first four words
        .join(' ');    //join the array with spaces
    }
    // args' keys --> linked, 
	window.jiali_post_item_template = function( args ) 
    {
        var post = args.post;

        var output = '';

        if(args.template == 'horizontal')
        {
            output += `<div class="jiali-card-item">`
                if( args.linked ) {
                    output += `<a class="jiali-permalink" href="${post.permalink}">`;
                }

                    output += `<div class="jiali-card jiali-horizontal-card">                
                        <div class="jiali-card-body">
                            <div>`
                                    if( args.title ) {
                                    output += `<h4 class="jiali-card-title">${jiali_trim_content(post.post_title, 5)}</h4>`
                                }
                                if( args.excerpt ) {
                                    output += `<p class="jiali-card-text">${jiali_trim_content(post.post_content, 10)}</p>`
                                }              
                            output += `</div>
                            <div class="jiali-card-info">`
                                    if( args.author ) {
                                    output += `<span class="jiali-avatar">
                                        ${post.authorAvatar}
                                    </span>
                                    <span class="jiali-card-author">${post.authorName}</span>
                                    <span class="text-muted">-</span>`
                                }

                                if( args.date ) {
                                    output += `<span class="jiali-card-date">${post.customDate}</span>`
                                }
                                if( args.views ) {
                                    if( args.date ){
                                    output += `<span class="text-muted">-</span>`
                                    }
                                    output += `<span class="jiali-card-views">
                                        <i class="fa-solid fa-eye"></i>
                                        ${post.views}
                                    </span>`
                                }
                            output += `</div>
                        </div>`
                        if( args.thumbnail ) {
                            output += `<div class="jiali-card-img-side">
                                <img src="${post.horizontalThumbnail}" alt="Card image cap">
                            </div>`
                        }
                    output += `</div>`
                    if( args.linked ) {

                        output += `</a>`
                    }

                output += `</div>`

            return output;
                        
        } else if ( args.template == 'vertical' )
        {

            output += `<div class="jiali-card-item">`;
                if( args.tags )
                {
                    if( post.postTags )
                    {
                        var tags = post.postTags;
                        output += `<div class="jiali-card-tags">`;
                        tags.forEach(function(tag) {
							output += `<span class="jiali-card-tag" style="background-color:${tag.color}">
                            ${tag.name}
                            <br>
                            </span>`
                        });
                        output += `</div>`
                    }
                }

                if( args.linked ) {
                    output += `<a class="jiali-permalink" href="${post.permalink}">`;
                }

                    output += `<div class="jiali-card jiali-vertical-card">`;
                        if( args.thumbnail ) {
                            output += `<img decoding="async" class="jiali-card-img-top" src="${args.thumbnailSize == 'large' ? post.largeVerticalThumbnail : post.mediumVerticalThumbnail }" alt="Card image cap">`
                        }                
                        output += `<div class="jiali-card-body">
                            <div>`
                                    if( args.title ) {
                                    output += `<h4 class="jiali-card-title">${jiali_trim_content(post.post_title, 5)}</h4>`
                                }
                                if( args.excerpt ) {
                                    output += `<p class="jiali-card-text">${jiali_trim_content(post.post_content, 10)}</p>`
                                }              
                            output += `</div>
                            <div class="jiali-card-info">`
                                    if( args.author ) {
                                    output += `<span class="jiali-avatar">
                                        ${post.authorAvatar}
                                    </span>
                                    <span class="jiali-card-author">${post.authorName}</span>
                                    <span class="text-muted">-</span>`
                                }

                                if( args.date ) {
                                    output += `<span class="jiali-card-date">${post.customDate}</span>`
                                }
                                if( args.views ) {
                                    if( args.date ){
                                    output += `<span class="text-muted">-</span>`
                                    }
                                    output += `<span class="jiali-card-views">
                                        <i class="fa-solid fa-eye"></i>
                                        ${post.views}
                                    </span>`
                                }
                            output += `</div>
                        </div>`
                        
                    output += `</div>`
                    if( args.linked ) {

                        output += `</a>`
                    }

                output += `</div>`

            return output;
        }

    }
});

