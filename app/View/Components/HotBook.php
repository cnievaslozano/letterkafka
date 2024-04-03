<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class HotBook extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {

        $hotbook = [
            'autor' => 'Franz Kafka',
            'enlace' => 'https://codepen.io/oliviale/full/BaovGmg',
            'imagen' => 'https://books.google.es/books/publisher/content?id=VbB7DwAAQBAJ&hl=es&pg=PP1&img=1&zoom=3&bul=1&sig=ACfU3U0BtxRb7V8u-tOsMeHtBk7Xij41Mw&w=1280',
            'texto' => 'En la quietud de la noche... se escuchaban solo susurros de misterio y promesa.',
        ];


        return view('components.kafka.hotbook', compact('hotbook'));
    }
}
