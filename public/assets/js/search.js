$(function(){
				console.log("Hello");
				var query1;var ele = document.getElementsByTagName("INPUT")[0].value;
	var $select = $('#select-movie').selectize({
			    valueField: 'Title',
			    labelField: 'Title',
			    searchField: ['Title','ID'],
			    options: [],
			    create: false,
			    addPrecedence:true,
			    // onItemAdd       : handler(),
                // placeholder: (ele.length ? ele : "Find a movie..."),
			    render: {
                    item: function(item, escape) {
	                    return '<div>' +
	                        (item.Title ? '<span class="name">' + escape(item.Title) + '</span>' : '') +
	                        // (item.imdbID ? '<span class="email">' + escape(item.imdbID) + '</span>' : '') +
	                    '</div>';
                    },
			        option: function(item, escape) {
			            var actors = [];
			            // for (var i = 0, n = item.abridged_cast.length; i < n; i++) {
			            //     actors.push('<span>' + escape(item.abridged_cast[i].name) + '</span>');
			            // }

			            // return '<div>' +
			            //     '<img src="' + escape(item.posters.thumbnail) + '" alt="">' +
			            //     '<span class="title">' +
			            //         '<span class="name">' + escape(item.title) + '</span>' +
			            //     '</span>' +
			            //     '<span class="description">' + escape(item.synopsis || 'No synopsis available at this time.') + '</span>' +
			            //     '<span class="actors">' + (actors.length ? 'Starring ' + actors.join(', ') : 'Actors unavailable') + '</span>' +
			            // '</div>';

			            return '<div id = '+item.imdbID+'>' +
			                '<img src="' + escape(item.Poster) + '" alt="N/A" style = "width:60px;height:70px; float:left; margin-left:10px; margin-right:10px; display:inline-block">' + '<div style = "text-align:left">' + 
			                '<span class="title" style = "font-weight:bold">' +
			                    '<span class="name">' + escape(item.Title) + '</span>' +
			                '</span>' + '<br>' + 
			                '<span class="description">' + escape(item.synopsis || 'No synopsis available at this time.') + '</span>' + '<br>' +
			                '<span class="actors">' + (actors.length ? 'Starring ' + actors.join(', ') : 'Actors unavailable') + '</span>' + '<br>'+
			                '<span class="year">' + escape(item.Year) + '</span>' +
			                '<span id = "id" style = "display:none">' + escape(item.imdbID) + '</span>' +
			                // '<span class="year">' + escape(item.Actors) + '</span>' +
			                // '<span class="year">' + escape(item.imdbRating) + '</span>' +
			            '</div>' + '</div>';

			            //  return '<div id = "item" onclick = "get_details('+item.imdbID+')">' +
			            //     '<img src="' + escape(item.Poster) + '" alt="N/A" style = "width:60px;height:70px; float:left; margin-left:10px; margin-right:10px; display:inline-block">' + '<div style = "text-align:left" id = "info">' + 
			            //     '<span class="title" style = "font-weight:bold">' +
			            //         '<span class="name">' + escape(item.Title) + '</span>' +
			            //     '</span>' + '<br>' + 
			            //     '<span class="description">' + escape(item.synopsis || 'No synopsis available at this time.') + '</span>' + '<br>' +
			            //     '<span class="actors">' + (actors.length ? 'Starring ' + actors.join(', ') : 'Actors unavailable') + '</span>' + '<br>'+
			            //     '<span class="year">' + escape(item.Year) + '</span>' +
			            //     // '<span class="year">' + escape(item.Actors) + '</span>' +
			            //     // '<span class="year">' + escape(item.imdbRating) + '</span>' +
			            // '</div>' + '</div>';
			        }
			        // console.log(item);
			    },
			    load: function(query, callback) {
			        if (!query.length) return callback();
			        // document.getElementsByTagName("INPUT")[0].value = query;
			        $.ajax({
			        	url: 'http://www.omdbapi.com/',
			            // url: 'http://api.rottentomatoes.com/api/public/v1.0/movies.json',
			            type: 'GET',
			            dataType: 'json',
			            data: {
			                s: query,
			                // page_limit: 10,
			                apikey: '3ca3eba0',
			                type: 'movie'
			                // page:2
			            },
			            error: function() {
			                callback();
			            },
			            success: function(res) {
			                // callback(res.movies);
			                // callback(res.Search);
			                console.log(res);
			                query1=query;
			           		$("input").attr("value",query1);
			                // console.log(query1);
			                callback(res.Search);
			            }
			        });
			    }
			});
// document.getElementsByTagName("INPUT")[0].setAttribute("name", "movie");
// console.log(query1);
var selectize = $select[0].selectize;
// selectize.addOption({title:'new',text:'foo'}); //option can be created manually or loaded using Ajax
// $('#button-additem').on('click', function() {
//     selectize.addItem(2);
// });
// selectize.addItem(13,true); 
// selectize.addItem('More',true);
				
				// $(document).on('click', 'div.selectize-input div.item', function (e) {
    //            alert("test");
			    // var selectize = $select[0].selectize;
			    selectize.on('item_add', handler);  //invoked when an item from the drop-down is selected
    });

// var handler = function() {
//     return function() {
//         console.log(name, arguments);
//         $('#log').append('<div><span class="name">' + name + '</span></div>');
//     };
// };
function handler()
{
	// if(flag)
	// console.log(selectize.getItem());
	// console.log(id);
	// console.log(arguments);

		id = document.getElementsByClassName("selected")[0].id;

	// window.location.href = "details.html";
	getdetails(id);

}

function getdetails(id)
{
	$.ajax({
    	url: 'http://www.omdbapi.com/',
        // url: 'http://api.rottentomatoes.com/api/public/v1.0/movies.json',
        type: 'GET',
        dataType: 'json',
        data: {
            i: id,
            // page_limit: 10,
            apikey: '3ca3eba0',
            type: 'movie'
            // page:2
        },
        error: function() {
            callback();
        },
        success: function(res) {
            // callback(res.movies);
            // callback(res.Search);
            ratings ='<ul>';
            count = 0;
            for(i in res.Ratings)
            {
            	count ++;
            	// if(count == res.Ratings.length)
            	// 	ratings += '<li>' + res.Ratings[i].Source + ':' + res.Ratings[i].Value + '</li>';
            	// else
            	// 	ratings += '<li>' + res.Ratings[i].Source + ':' + res.Ratings[i].Value + ',' + '</li>';
            		ratings += '<li>' + res.Ratings[i].Source + ':' + ' ' + '<b>' + res.Ratings[i].Value + '</b></li>';
            }

            ratings += '</ul>'
            console.log(ratings);
            console.log(res);
            var element = '<div class = "container movie"><div class = "row">'+ '<div class = "col-md-4"><img src="' + 
            res.Poster + '" alt="N/A"></div>' + '<div class = "col-md-4"><b style = "font-weight:70px; font-size:40px">' + res.Title +'</b>'+ '<br><i>(' 
            + res.Released + ')</i><br><i>' + res.Genre +'</i></div>'+ '<div class = "col-md-4"><u><b style = "font-size:20px">Ratings:</b></u><br> ' + ratings + '</div>' + 
            '</div><div class = "row"> <div class = col-md-3><b>Actors:</b> '+ res.Actors + '<br><b>Awards:</b> ' + 
            res.Awards + '<br><b>BoxOffice:</b> ' + res.BoxOffice + '<br><b>Country:</b>'+ res.Country + 
            '<br><b>DVD:</b> '+ res.DVD + '</div>'+'<div class = col-md-3><b>Director:</b> '+res.Director + 
            '<br><b>Genre:</b> ' + res.Genre + '<br><b>Language:</b> ' + res.Language + '<br><b>Metascore:</b> ' + 
            res.Metascore + '<br><b>Production:</b> '+res.Production + '<br><b>Rated:</b> ' + res.Rated + '</div>' + 
            '<div class = col-md-3><b>Released:</b> ' + res.Released + 
            '<br><b>Response:</b> ' + res.Response + '<br>'+ res.Runtime + '<br><b>Title:</b> ' + res.Title + 
            '<br><b>Type:</b> '+ res.Type + '<br><b>Website:</b> ' +'</div>'+'<div class = col-md-3><b>Runtime:</b> '+ 
            res.Website + '<br><b>Writer:</b> ' + res.Writer + '</div>'+ '<div class = col-md-3><b>Year:</b> '+
            res.Year + '<br><b>ID:</b> ' + res.imdbID + '<br><b>IMDB Rating:</b> ' + res.imdbRating + 
            '<br><b>IMDB Votes:</b> ' + res.imdbVotes + '</div></div>'+ '<div class = "row">'+'<br><b>Plot:</b> ' + 
            res.Plot + '<br>'+'</div>'+'<div class = "row" style = "text-align:center"><button type = "button" class= "btn btn-primary" style = "background-color: #337ab7;border-color: #2e6da4;border-radius:5px" onclick="location.reload()">Back</button>' + 
            '</div></div>';
            // document.write(element);
            // $("body").append(element);
            document.getElementById('b').innerHTML = element;

            // callback(res.Search);
        }
    });
}