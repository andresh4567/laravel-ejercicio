// var url = 'http://localhost/masterPHP/ej3/public/';
// window.addEventListener('load', function(){
//     function Like(){
//         $('.btn-like').unbind('click').click(function(){
//             $(this).addClass('btn-dislike').removeClass('btn-like');
//             $(this).attr('src', url+'img/corazon-rojo.png');
//         });

//         $.ajax({
//             url: url+'Like/'+$(this).data('id'),
//             type: 'GET',
//             success: function(response){
//                 if(response.like){

//                 }
//             }
//         });

//         Dislike();
//     }
//     Like();

//     function Dislike(){
//         $('.btn-dislike').unbind('click').click(function(){
//             $(this).addClass('btn-like').removeClass('btn-dislike');
//             $(this).attr('src', url+'img/corazon-negro.png');
//         });

//         $.ajax({
//             url: url+'Dislike/'+$(this).data('id'),
//             type: 'GET',
//             success: function(response){
//                 if(response.like){
                    
//                 }
//             }
//         });

//         Like();
//     }
//     Dislike();
// });   