<?php
	// echo $viewmodel;
$count = 1;

?>
<script src = "/public/assets/js/search.js"></script>
<!-- <script>function handler(){;}</script> -->
<style>
@media (min-width: 558px){
.col-xs-def {
    width: 80%;
  }
 }
 @media (min-width: 768px){
.col-sm-def {
    width: 60%;
  }
}
@media (min-width: 992px){
.col-md-def {
    width: 40%;
  }
}
@media (min-width: 1200px){
.col-lg-def {
    width: 20%;
  }
 }
 a:hover{
  cursor:pointer;
 }
</style>
<div class="col-xs-12 col-sm-8 col-md-9 content-column" style = "width:100%;margin:auto">
    <!-- <div class="grid" style="position: relative; height: 1154.94px;"> -->
    	<div class="grid" style="overflow-x:hidden">
      	<div class="row">

<style>
button{
	background-color:inherit;
}
.pagination-1 {
    display: inline-block;
    border:0;
    border-radius:25px;
    background-color: whitesmoke;
}

.pagination-1 button {
    color: black;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
    transition: background-color .3s;
    border:0;
    border-radius:25px;
    /*color:yellow;    */
}

.pagination-1 button.active {
    background-color: #4CAF50;
    color: white;
    background-color: #0275d8;
    border-color: #0275d8;
    border-radius:25px;
}

.pagination-1 button:hover:not(.active) {background-color: #ddd;}
</style>

<?php foreach($viewmodel['Search'] as $movie): $count++?>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2 masonry-item col-xs-def col-sm-def col-md-def col-lg-def" style = "height:350px;margin-bottom:20px;"> 
                  <div class="box-masonry" style = "height:100%"><a onclick = "getdetails('<?=$movie["imdbID"]?>')" title="" class="box-masonry-image with-hover-overlay" style = "height:55%;margin-bottom:0px"><img src="<?=$movie['Poster']?>" alt="N/A" class="img-responsive" style = "max-height:100%;max-width:100%"></a>
                    <!-- <div class="box-masonry-hover-text-header"> --> 
                    	<div class="box-masonry-text" style = "height:45%; display:inline">
                      <h4 style = "font-size:12px"> <a onclick = "getdetails('<?=$movie["imdbID"]?>')"><?=$movie['Title']?></a></h4>
                      <div class="box-masonry-desription">
                        <!-- <p>Creator of Bootstrap, engineer at Twitter &amp; Medium. Founder of Bumpers. </p> -->
                      <p>
                        <b>Year: <?=$movie['Year']?></b><br>
                        <b>Type : <?=$movie['Type']?></b><br>
                        <b name = "id">IMDBID: <?=$movie['imdbID']?></b>
                      </p>
                      </div>
                    </div>
                  </div>
                </div>
 <?php endforeach; ?>
		</div>
     </div>
     <?php $rows = $viewmodel['totalResults']?>
</div>

<!-- <nav aria-label="...">
  <ul class="pagination justify-content-center"">
    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1">Previous</a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item active">
      <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
    </li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>
</nav> -->
<!-- <div class = "btn-group">
<nav aria-label="...">
  <ul class="pagination justify-content-center"">
    <li class="page-item disabled">
      <button class="btn" tabindex="-1">Previous</button>
    </li>
    <li class="page-item"><button class="btn">1</button></li>
    <li class="page-item active">
      <button class="btn">2 <span class="sr-only">(current)</span></button>
    </li>
    <li class="page-item"><button class="btn">3</button></li>
    <li class="page-item">
      <button class="btn">Next</button>
    </li>
  </ul>
</nav>
</div> -->
<!-- <div class="btn-group">
    <button class="btn btn-default someclass" type="submit">Previous</button>
    <button class="btn btn-default someclass" type="submit">1</button>
    <button class="btn btn-default someclass" type="submit">2</button>
    <button class="btn btn-default someclass" type="submit">Next</button>
</div> -->

<form action = "fetch" method = "post">
<div class="pagination-1">
	<input name = "movie1" value = "<?=$viewmodel['movie_search']?>" style = "display:none"/>
  <button name = "page" value = "<?php if($viewmodel['page_no']-1>0) echo $viewmodel['page_no']-1?>">&laquo;</button>
  <?php for($i=1;$i<=($rows/10 + $rows%10) && $i<=10;$i++):?>
  	<?php if($viewmodel['page_no'] == $i):?>
  		<button name = "page" value = "<?=$i?>" class = "active"><?=$i?></button>
  	<?php else:?>
		<button name = "page" value = "<?=$i?>" ><?=$i?></button>
  	<?php endif;?>
  <?php endfor;?>
  <button name = "page" value = "<?php if($rows >= $viewmodel['page_no']+1) echo $viewmodel['page_no']+1?>">&raquo;</button>
</div>
</form>
