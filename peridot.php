<?php
// use Evenement\EventEmitterInterface;
// use Peridot\Configuration;
//
// return function(EventEmitterInterface $emitter) {
//   $emitter->on('peridot.configure', function (Configuration $configuration) {
//     $configuration->setPath('specs');
//   });
// };

use Evenement\EventEmitterInterface;
use Peridot\Plugin\Prophecy\ProphecyPlugin;
use Peridot\Plugin\Watcher\WatcherPlugin;

return function(EventEmitterInterface $emitter) {
  $watcher = new WatcherPlugin($emitter);
  $watcher->track(__DIR__ . '/src');

  new ProphecyPlugin($emitter);
};

 ?>
