CREATE TABLE IF NOT EXISTS `#__jomwebplayer_settings` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `width` int(5) NOT NULL,
  `height` int(5) NOT NULL,
  `title` tinyint(4) NOT NULL DEFAULT '1',
  `description` tinyint(4) NOT NULL DEFAULT '1',
  `licensekey` varchar(50) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `logoposition` varchar(15) NOT NULL,
  `logoalpha` int(3) NOT NULL,
  `logotarget` varchar(255) NOT NULL,
  `skinmode` varchar(20) NOT NULL,
  `stretchtype` varchar(20) NOT NULL,
  `buffertime` int(3) NOT NULL,
  `volumelevel` int(3) NOT NULL,
  `autoplay` tinyint(4) NOT NULL,
  `playlistautoplay` tinyint(4) NOT NULL,
  `playlistopen` tinyint(4) NOT NULL,
  `playlistrandom` tinyint(4) NOT NULL,
  `ffmpeg` varchar(255) NOT NULL DEFAULT '/usr/bin/ffmpeg/',
  `flvtool2` varchar(255) NOT NULL DEFAULT '/usr/bin/flvtool2/',
  `qtfaststart` varchar(255) NOT NULL DEFAULT '/usr/bin/qt-faststart/',
  `rows` int(5) NOT NULL DEFAULT '3',
  `cols` int(5) NOT NULL DEFAULT '3',
  `thumbwidth` int(5) NOT NULL DEFAULT '145',
  `thumbheight` int(5) NOT NULL DEFAULT '80',
  `subcategories` tinyint(4) NOT NULL DEFAULT '1',
  `relatedvideos` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `#__jomwebplayer_skin` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `controlbar` tinyint(4) NOT NULL,
  `playpause` tinyint(4) NOT NULL,
  `progressbar` tinyint(4) NOT NULL,
  `timer` tinyint(4) NOT NULL,
  `share` tinyint(4) NOT NULL,
  `volume` tinyint(4) NOT NULL,
  `fullscreen` tinyint(4) NOT NULL,
  `playdock` tinyint(4) NOT NULL,
  `videogallery` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `#__jomwebplayer_videos` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL DEFAULT '',
  `type` varchar(20) NOT NULL,
  `streamer` varchar(255) NOT NULL,
  `dvr` tinyint(4) NOT NULL,
  `video` varchar(255) NOT NULL,
  `hdvideo` varchar(255) NOT NULL,
  `preview` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `featured` tinyint(4) NOT NULL,
  `user` varchar(255) NOT NULL DEFAULT 'Admin',
  `tags` varchar(255) NOT NULL,
  `metadescription` text NOT NULL DEFAULT '',
  `views` int(5) NOT NULL,
  `ordering` int(5) NOT NULL DEFAULT '0',
  `published` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `#__jomwebplayer_category` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `parent` int(10) NOT NULL DEFAULT '0',
  `ordering` int(5) NOT NULL DEFAULT '0',
  `type` varchar(255) NOT NULL DEFAULT 'Url',
  `image` varchar(255) NOT NULL,
  `metakeywords` text NOT NULL DEFAULT '',
  `metadescription` text NOT NULL DEFAULT '',
  `published` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `#__jomwebplayer_googleads` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `adscript` text NOT NULL,
  `component` tinyint(4) NOT NULL,
  `module` tinyint(4) NOT NULL,
  `plugin` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
);