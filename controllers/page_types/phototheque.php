<?php
class PhotothequePageTypeController extends Controller {
  public function on_start() {
    $this->addHeaderItem(Loader::helper('html')->css('vendor/ilightbox.css', 'coteo_phototheque'));
    $this->addHeaderItem(Loader::helper('html')->css('application.css', 'coteo_phototheque'));
    $this->addHeaderItem('<script type="text/javascript">var jqC5 = jQuery.noConflict(true);</script>');
    $this->addHeaderItem(Loader::helper('html')->javascript('vendor/jquery-1.11.2.min.js', 'coteo_phototheque'));
    $this->addHeaderItem(Loader::helper('html')->javascript('vendor/jquery.mousewheel.js', 'coteo_phototheque'));
    $this->addHeaderItem(Loader::helper('html')->javascript('vendor/isotope.pkgd.min.js', 'coteo_phototheque'));
    $this->addHeaderItem(Loader::helper('html')->javascript('vendor/ilightbox.js', 'coteo_phototheque'));
    $this->addHeaderItem('<script type="text/javascript">var jquery1112 = jQuery.noConflict(true);$=jqC5;jQuery=jqC5</script>');
  }
}
