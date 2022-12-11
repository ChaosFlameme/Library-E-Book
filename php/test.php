<html>  
<head>  
<title>  
JQuery Pagination  
</title>  
<meta name="viewport" content="width=device-width, initial-scale=1">  
<head>  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">  
<style>  
.wrapper {  
  margin: 30px auto;  
  text-align: center;  
}  
h1 {  
  margin-bottom: 1em;  
 color: #007bff;  
}  
#pagination-demo {  
  display: inline-block;  
  margin-bottom: 1em;  
  margin-top: 1em;  
}  
#pagination-demo li {  
  display: inline-block;  
}  
#data td, #data th {  
  border: 1px solid #ddd;  
  padding: 6px;  
}  
#data tr:hover {   
background-color: #ddd;  
}  
.page-content {  
  background: #eee;  
  display: inline-block;  
  padding: 10px;  
  width: 100%;  
  max-width: 660px;  
}  
#data th {  
  padding-top: 10px;  
  padding-bottom: 10px;  
  text-align: left;  
  background-color: #007bff;  
  color: white;  
}  
table, th, td {  
  border: 1px solid black;  
}  
#page-content {  
color: white;  
 background-color: #007bff;  
}  
</style>  
<script src="https://code.jquery.com/jquery-3.5.1.min.js"> </script>  
<script src = "https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.4.1/jquery.twbsPagination.min.js"> </script>  
<script>  
$(function () {  
$("#pagination-demo").twbsPagination({  
  totalPages: 16,  
  visiblePages: 2,  
  next: "Next",  
  prev: "Prev",  
  onPageClick: function (event, page) {  
    //fetch content and render here  
    $("#page-content").text ("Page? + page + ?content here");  
  }  
});  
});  
</script>  
<body>  
<div class="wrapper">  
  <div class="container">  
  <div class="row">  
  <div class="col-sm-12">  
  <h1> jQuery Pagination </h1>  
 <table id="data" align="center">  
 <tr>  
    <th>Company</th>  
    <th>Contact</th>  
    <th>Country</th>  
  </tr>  
  <tr>  
    <td> Alfreds Futterkiste</td>  
    <td>Maria Anders</td>  
    <td>Germany</td>  
  </tr>  
  <tr>  
    <td>Berglunds snabbk?p</td>  
    <td>Christina Berglund</td>  
    <td>Sweden</td>  
  </tr>  
  <tr>  
    <td>Centro comercial Moctezuma</td>  
    <td>Francisco Chang</td>  
    <td>Mexico</td>  
  </tr>  
  <tr>  
    <td>Ernst Handel</td>  
    <td>Roland Mendel</td>  
    <td>Austria</td>  
  </tr>  
  <tr>  
    <td>Island Trading</td>  
    <td>Helen Bennett</td>  
    <td>UK</td>  
  </tr>  
  <tr>  
    <td>K?niglich Essen</td>  
    <td>Philip Cramer</td>  
    <td>Germany</td>  
  </tr>  
  <tr>  
    <td>Laughing Bacchus Winecellars</td>  
    <td>Yoshi Tannamuri </td>  
    <td>Canada</td>  
  </tr>  
  <tr>  
    <td> Magazzini Alimentari </td>  
    <td> Giovanni Rovelli</td>  
    <td>Italy</td>  
  </tr>  
  <tr>  
    <td>North/South</td>  
    <td>Simon Crowther</td>  
    <td>UK</td>  
  </tr>  
  <tr>  
    <td>Paris specialties</td>  
    <td>Marie Bertrand</td>  
    <td>France</td>  
  </tr>  
  <tr>  
    <td>Laughing Bacchus Winecellars</td>  
    <td>Yoshi Tannamuri</td>  
    <td>Canada</td>  
  </tr>  
    
</table>  
        <ul id="pagination-demo" class="pagination-sm">  
</ul>  
      </div>  
    </div>  
 <div id="page-content" class="page-content"> Page 1</div>  
  </div>  
</div>  
</body>  
</html>  
