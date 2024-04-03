<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class BlogsAleatorio extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        $blogsAleatorios = [
            [
                'enlace' => 'https://www.planetadelibros.com/blog/actualidad/15/nuestros-tops/11/articulo/beneficios-de-leer/237',
                'fuente' => 'planetadelibros.com',
                'titulo' => 'Beneficios de leer a diario',
                'texto' => 'Se suele decir que el perro es el mejor amigo del humano. Sin robarle amor a nuestros amigos de
                cuatro patas, nosotros nos alineamos más con lo que decía Ernest Hemingway: «jamás habrá amigo más
                fiel que un libro». En los últimos tiempos los índices de consumo de libros han aumentado e incluso
                hemos incorporado nuevos formatos como el audiolibro a nuestros hábitos. La lectura es nuestra forma
                de evasión con mayúsculas, cuando por enfermedad u otras causas nos fallan el resto de recursos. Un
                libro nos permite ampliar nuestros horizontes, sin importar dónde o con quién estemos. Y adentrarnos
                en las páginas de un libro es el equivalente a subirnos en un avión del que solo nosotros elegimos
                el destino. Y porque los libros, a parte de diversión, nos aportan un montón de beneficios. ¿Cuáles?',
                'imagen' => 'https://www.corachan.com/images/63901/facebook.jpeg'
            ],
            [
                'enlace' => 'https://www.mirahadas.com/publicar-un-libro/',
                'fuente' => 'mirahadas.com',
                'titulo' => 'Publicar un libro',
                'texto' => 'Te gusta escribir y dedicas tus ratos libres a darle forma a esa historia que estás convencido que se puede convertir en un libro real, que puedes vender y hacer llegar a miles de lectores. Seguro que entonces ya te habrás planteado en más de una ocasión cómo sería poder publicar un libro. La forma de publicar libros hoy en día ha cambiado. Ya no es imprescindible tener el apoyo de una editorial o grupo editorial, al ser cada vez más los escritores noveles que deciden realizar la edición de sus propias historias. Y son numerosas las editoriales, como la Editorial Mirahadas, que te dan la posibilidad de hacer una publicación de tu manuscrito.',
                'imagen' => 'https://ca9365d77f.clvaw-cdnwnd.com/e3bda1ef0a04c20efaa15f0a88b5c0da/200000946-4104d41051/edici%C3%B3n.png?ph=ca9365d77f'
            ]
        ];

        $indiceAleatorio = array_rand($blogsAleatorios);
        $blogsAleatorios = $blogsAleatorios[$indiceAleatorio];


        return view('components.kafka.blog', compact('blogsAleatorios'));
    }
}
