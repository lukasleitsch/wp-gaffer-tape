<?php

namespace Leitsch\GafferTape;

use Exception;
use Leitsch\GafferTape\Services\Mail;
use Leitsch\GafferTape\Services\Menu;
use Leitsch\GafferTape\Services\Service;

class PluginServiceProvider {
    protected static $instance;

    public static function instance(): self
    {
        return static::$instance = static::$instance ?? new static();
    }

    public function init() {
        $services = $this->getServices();
        $services = array_map( [ $this, 'instantiateService' ], $services );
        array_walk(
            $services,
            function ( Service $service ) {
                $service->register();
            }
        );
    }

    private function instantiateService( $class ): Service {
        if ( ! class_exists( $class ) ) {
            throw new Exception( 'Class don\'t exist.' );
        }

        $service = new $class();

        if ( ! $service instanceof Service ) {
            throw new Exception( 'Is not a service.' );
        }

        return $service;
    }


    private function getServices(): array {
        return [
            Menu::class,
            Mail::class,
        ];
    }

}
