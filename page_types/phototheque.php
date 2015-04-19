<?php defined('C5_EXECUTE') or die(_("Access Denied.")); ?>

<div class="container">
<h1><?php $c->getCollectionName(); ?></h1>
<p>
  https://www.concrete5.org/documentation/developers/5.6/files/grouping-files-with-sets
  <br />
  http://www.concrete5.org/documentation/developers/5.6/files/searching-and/
  <br />
  http://www.concrete5.org/documentation/developers/5.6/files/files-and-file-versions/
  <br />
  http://www.concrete5.org/documentation/developers/5.6/files/helpers/
  <br />
  http://www.frescojs.com/
</p>


<ul class="isotope list-galerie list-unstyled">
<?php

Loader::model('file_list');
$fl = new FileList();
$fs = FileSet::getByName('phototheque');
$fl->filterBySet($fs);
//filtre sur les images. Penser à développer la gestion des vidéos et autres types de doc //$thumb_src = $this->getThemePath() .'/images/noimage.png';
$fl->filterByType(FileType::T_IMAGE);
//  Gérer l'ordre ????
//$fl->sortByFileSetDisplayOrder();
$files = $fl->get();

$ih = Loader::helper('image');
foreach ($files as $f) {

  if (is_object($f)) {
    $fv = $f->getRecentVersion();
    $level = 2;
    if( $fv->hasThumbnail($level) ) {
      $thumb_src = $fv->getThumbnailSRC($level);
    } else {
      //$fv->refreshThumbnails();
      $thumb = $ih->getThumbnail($f, 250, 250, false);
      $thumb_src = $thumb->src;
    }
  }
  echo '
  <li class="galerie-item">
    <a class="galerie-thumbnail" href="'. $fv->getRelativePath() .'"><img src="'. $thumb_src .'" alt="'. $fv->getDescription() .'" /></a>
  </li>';
  //echo '<li class="item"><a href="'. $fv->getPath() .'"><img src="'. $fv->getURL() .'"/></a></li>';
}
?>
</ul>

<br/>

<script type="text/javascript">
( function($) {
  $(document).ready(function() {

    $('.isotope').isotope({
      masonry: {
        gutter: 15
      },
      itemSelector: '.galerie-item',
    });

    $('.galerie-thumbnail').iLightBox({
      skin: 'dark',
      path: 'horizontal',
      fullViewPort: 'centre',
      infinite: true,
      linkId: "photo",
      overlay: {
        opacity: 1,
        blur: false
      },
      controls: {
        thumbnail: true
      },
      styles: {
        nextOffsetX: -45,
        prevOffsetX: -45
      }
    });

  });
} ) ( jquery1112 );


</script>


</div>
