<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
		'css/global.css',
		'css/structure.css',
		'css/hotel2.css',
		'css/custom.css',
		'plugins/rs-plugin/css/settings.css',
    ];
    public $js = [
		'js/jquery-2.1.4.min.js',
		'js/mfn.menu.js',
		'js/jquery.plugins.js',
		'js/jquery.jplayer.min.js',
		'js/animations/animations.js',
		'js/scripts.js',
		'plugins/rs-plugin/js/jquery.themepunch.tools.min.js',
		'plugins/rs-plugin/js/jquery.themepunch.revolution.min.js',
		'plugins/rs-plugin/js/extensions/revolution.extension.video.min.js',
		'plugins/rs-plugin/js/extensions/revolution.extension.slideanims.min.js',
		'plugins/rs-plugin/js/extensions/revolution.extension.actions.min.js',
		'plugins/rs-plugin/js/extensions/revolution.extension.layeranimation.min.js',
		'plugins/rs-plugin/js/extensions/revolution.extension.kenburn.min.js',
		'plugins/rs-plugin/js/extensions/revolution.extension.navigation.min.js',
		'plugins/rs-plugin/js/extensions/revolution.extension.migration.min.js',
		'plugins/rs-plugin/js/extensions/revolution.extension.parallax.min.js',
		'js/email.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        // 'yii\bootstrap\BootstrapAsset',
        // 'yii\bootstrap\BootstrapPluginAsset',
    ];
}
