<?php

defined('C5_EXECUTE') or die(_("Access Denied."));

class CoteoPhotothequePackage extends Package {

  protected $pkgHandle = 'coteo_phototheque';
  protected $appVersionRequired = '5.6.0';
  protected $pkgVersion = '0.1';

  public function getPackageDescription()
  {
    return t("Phototheque Jquery Responsive");
  }

  public function getPackageName()
  {
    return t("Coteo Phototheque");
  }

  public function on_start() {}

    public function install()
    {
      $pkg = parent::install();
      // $this->installBlocks($pkg);
      // $this->installSinglePages($pkg);
      // $this->installPageAttributes($pkg);
      $this->installFileAttributes($pkg);
      // $this->installUserAttributes($pkg);
      $this->installPageTypes($pkg);
      // $this->installPages($pkg);
      // $this->installThemes($pkg);
      // $this->installJobs($pkg);
      // $this->installGroups();
      // $this->setPermissions();

    }

    public function upgrade() {
      parent::upgrade();
    }

    private function installPageTypes($pkg) {
      $phototheque = CollectionType::getByHandle('phototheque');
      if (!is_object($phototheque)) {
        $data = array(
          'ctHandle' => 'phototheque',
          'ctName' => t('Phototheque'));
          $phototheque = CollectionType::add($data, $pkg);
        }
      }

      // private function installPageAttributes($pkg) {
      //
      //   $cakc = AttributeKeyCategory::getByHandle('collection');
      //   $cakc->setAllowAttributeSets(AttributeKeyCategory::ASET_ALLOW_SINGLE);
      //   $akcas = $cakc->addSet('phototheque', t('Photothèque'), $pkg);
      // }

      private function installFileAttributes($pkg) {
        Loader::model('file_set');
        $fs = FileSet::createAndGetSet('phototheque', FileSet::TYPE_PUBLIC, $uID = false);
      }

    }
    ?>
