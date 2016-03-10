$(document).ready(function(){
    
  $("#list").jqGrid({
    url:'films.php',
    datatype: 'json',
    mtype: 'GET',
    colNames:['Film ID','Title', 'Description','Rental Rate','Length','Rating'],
    colModel :[ 
      {name:'film_id', index:'film_id', width:65}, 
      {name:'title', index:'title', width:125}, 
      {name:'description', index:'description', width:400, sortable:false}, 
      {name:'rental_rate', index:'rental_rate', width:85, align:'right'}, 
      {name:'length', index:'length', width:65, align:'right'}, 
      {name:'rating', index:'rating', width:55 } 
    ],
    pager: '#pager',
    rowNum:10,
    rowList:[10,20,30],
    sortname: 'film_id',
    sortorder: 'desc',
    viewrecords: true,
    gridview: true,
    height: '100%',
    caption: 'My Films Grid'
  }); 
});






