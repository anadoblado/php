<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CatalogController extends Controller
{


    public function getIndex(){

       // return view('catalog.index', ['arrayPeliculas' => $this->arrayPeliculas]);

        //$movies = DB::table('movies')->get();
        $movies = Movie::all();
        return view('catalog.index')->with('peliculas', $movies);
    }

    public function getShow($id){
        //return view('catalog.show',['peliculas' => $this->arrayPeliculas[$id],'id'=>$id]);

        $movies = Movie::findOrFail($id);
        return view('catalog.show')->with('peliculas', $movies);
    }

    public function getCreate(){
        return view('catalog.create');
    }

    public function getEdit($id){
        $movies = Movie::findOrFail($id);
        return view('catalog.edit')->with('peliculas', $movies);
        //return view('catalog.edit', array('id'=>$id));
    }

    private $arrayPeliculas = array(
        array(
            'title' => 'El padrino',
            'year' => '1972',
            'director' => 'Francis Ford Coppola',
            'poster' => 'https://i.pinimg.com/originals/98/50/fd/9850fdd7bda6610b1abb50c91e5bab2b.jpg',
            'rented' => false,
            'synopsis' => 'Don Vito Corleone (Marlon Brando) es el respetado y temido jefe de una de las cinco familias de la mafia de Nueva York. Tiene cuatro hijos: Connie (Talia Shire), el impulsivo Sonny (James Caan), el pusilánime Freddie (John Cazale) y Michael (Al Pacino), que no quiere saber nada de los negocios de su padre. Cuando Corleone, en contra de los consejos de \'Il consigliere\' Tom Hagen (Robert Duvall), se niega a intervenir en el negocio de las drogas, el jefe de otra banda ordena su asesinato. Empieza entonces una violenta y cruenta guerra entre las familias mafiosas.'
        ),
        array(
            'title' => 'El Padrino. Parte II',
            'year' => '1974',
            'director' => 'Francis Ford Coppola',
            'poster' => 'https://lh3.googleusercontent.com/proxy/6k130tD8ZbXcYxkCYgwxVqteROHI5lraTr3amd33g3Dm5vqiKQhzOaBPFL6H7CVdg4rLtZbm2E4pC2KFSAokDos2dG5sqxbdB44KFTsCqmdf0kOyH9y-nPJDnnw1qFWxmEk',
            'rented' => false,
            'synopsis' => 'Continuación de la historia de los Corleone por medio de dos historias paralelas: la elección de Michael Corleone como jefe de los negocios familiares y los orígenes del patriarca, el ya fallecido Don Vito, primero en Sicilia y luego en Estados Unidos, donde, empezando desde abajo, llegó a ser un poderosísimo jefe de la mafia de Nueva York.'
        ),
        array(
            'title' => 'La lista de Schindler',
            'year' => '1993',
            'director' => 'Steven Spielberg',
            'poster' => 'https://www.tuposter.com/pub/media/catalog/product/cache/image/700x560/91bbed04eb86c2a8aaef7fbfb2041b2a/s/c/schindlers_list_poster.jpg',
            'rented' => false,
            'synopsis' => 'Segunda Guerra Mundial (1939-1945). Oskar Schindler (Liam Neeson), un hombre de enorme astucia y talento para las relaciones públicas, organiza un ambicioso plan para ganarse la simpatía de los nazis. Después de la invasión de Polonia por los alemanes (1939), consigue, gracias a sus relaciones con los nazis, la propiedad de una fábrica de Cracovia. Allí emplea a cientos de operarios judíos, cuya explotación le hace prosperar rápidamente. Su gerente (Ben Kingsley), también judío, es el verdadero director en la sombra, pues Schindler carece completamente de conocimientos para dirigir una empresa.'
        ),
        array(
            'title' => 'Pulp Fiction',
            'year' => '1994',
            'director' => 'Quentin Tarantino',
            'poster' => 'https://images-na.ssl-images-amazon.com/images/I/71c05lTE03L._AC_SY879_.jpg',
            'rented' => true,
            'synopsis' => 'Jules y Vincent, dos asesinos a sueldo con muy pocas luces, trabajan para Marsellus Wallace. Vincent le confiesa a Jules que Marsellus le ha pedido que cuide de Mia, su mujer. Jules le recomienda prudencia porque es muy peligroso sobrepasarse con la novia del jefe. Cuando llega la hora de trabajar, ambos deben ponerse manos a la obra. Su misión: recuperar un misterioso maletín. '
        ),
        array(
            'title' => 'Cadena perpetua',
            'year' => '1994',
            'director' => 'Frank Darabont',
            'poster' => 'http://es.web.img3.acsta.net/medias/nmedia/18/74/26/88/20133359.jpg',
            'rented' => true,
            'synopsis' => 'Acusado del asesinato de su mujer, Andrew Dufresne (Tim Robbins), tras ser condenado a cadena perpetua, es enviado a la cárcel de Shawshank. Con el paso de los años conseguirá ganarse la confianza del director del centro y el respeto de sus compañeros de prisión, especialmente de Red (Morgan Freeman), el jefe de la mafia de los sobornos.'
        ),
        array(
            'title' => 'El golpe',
            'year' => '1973',
            'director' => 'George Roy Hill',
            'poster' => 'http://es.web.img2.acsta.net/c_215_290/pictures/14/03/27/13/16/401621.jpg',
            'rented' => false,
            'synopsis' => 'Chicago, años treinta. Redford y Newman son dos timadores que deciden vengar la muerte de un viejo y querido colega, asesinado por orden de un poderoso gángster (Robert Shaw). Para ello urdirán un ingenioso y complicado plan con la ayuda de todos sus amigos y conocidos.'
        ),
        array(
            'title' => 'La vida es bella',
            'year' => '1997',
            'director' => 'Roberto Benigni',
            'poster' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRbVE5s-ZQBfYM_JEjhjWRRwI8cQGRs9YNzuWB7Go5sSQgiwS96',
            'rented' => true,
            'synopsis' => 'En 1939, a punto de estallar la Segunda Guerra Mundial (1939-1945), el extravagante Guido llega a Arezzo (Toscana) con la intención de abrir una librería. Allí conoce a Dora y, a pesar de que es la prometida del fascista Ferruccio, se casa con ella y tiene un hijo. Al estallar la guerra, los tres son internados en un campo de exterminio, donde Guido hará lo imposible para hacer creer a su hijo que la terrible situación que están padeciendo es tan sólo un juego.'
        ),
        array(
            'title' => 'Uno de los nuestros',
            'year' => '1990',
            'director' => 'Martin Scorsese',
            'poster' => 'http://es.web.img2.acsta.net/medias/nmedia/18/67/70/14/20077949.jpg',
            'rented' => false,
            'synopsis' => 'Henry Hill, hijo de padre irlandés y madre siciliana, vive en Brooklyn y se siente fascinado por la vida que llevan los gángsters de su barrio, donde la mayoría de los vecinos son inmigrantes. Paul Cicero, el patriarca de la familia Pauline, es el protector del barrio. A los trece años, Henry decide abandonar la escuela y entrar a formar parte de la organización mafiosa como chico de los recados; muy pronto se gana la confianza de sus jefes, gracias a lo cual irá subiendo de categoría. '
        ),
        array(
            'title' => 'Alguien voló sobre el nido del cuco',
            'year' => '1975',
            'director' => 'Milos Forman',
            'poster' => 'https://play-lh.googleusercontent.com/kTqHFStOG0OghpKZ19Wpo18jjwFwED8GMSVGVv_6Vs0eeAyMTBfsWeCb2pyZanFEn7L_',
            'rented' => false,
            'synopsis' => 'Randle McMurphy (Jack Nicholson), un hombre condenado por asalto, y un espíritu libre que vive contracorriente, es recluido en un hospital psiquiátrico. La inflexible disciplina del centro acentúa su contagiosa tendencia al desorden, que acabará desencadenando una guerra entre los pacientes y el personal de la clínica con la fría y severa enfermera Ratched (Louise Fletcher) a la cabeza. La suerte de cada paciente del pabellón está en juego.'
        ),
        array(
            'title' => 'American History X',
            'year' => '1998',
            'director' => 'Tony Kaye',
            'poster' => 'https://www.tuposter.com/pub/media/catalog/product/cache/image/700x560/91bbed04eb86c2a8aaef7fbfb2041b2a/f/i/file_75_1.jpg',
            'rented' => false,
            'synopsis' => 'Derek (Edward Norton), un joven "skin head" californiano de ideología neonazi, fue encarcelado por asesinar a un negro que pretendía robarle su furgoneta. Cuando sale de prisión y regresa a su barrio dispuesto a alejarse del mundo de la violencia, se encuentra con que su hermano pequeño (Edward Furlong), para quien Derek es el modelo a seguir, sigue el mismo camino que a él lo condujo a la cárcel.'
        ),
        array(
            'title' => 'Sin perdón',
            'year' => '1992',
            'director' => 'Clint Eastwood',
            'poster' => 'https://cloud10.todocoleccion.online/cine-peliculas-dvd/tc/2009/09/25/15085326.jpg',
            'rented' => false,
            'synopsis' => 'William Munny (Clint Eastwood) es un pistolero retirado, viudo y padre de familia, que tiene dificultades económicas para sacar adelante a su hijos. Su única salida es hacer un último trabajo. En compañía de un viejo colega (Morgan Freeman) y de un joven inexperto (Jaimz Woolvett), Munny tendrá que matar a dos hombres que cortaron la cara a una prostituta.'
        ),
        array(
            'title' => 'El precio del poder',
            'year' => '1983',
            'director' => 'Brian De Palma',
            'poster' => 'https://www.tuposter.com/pub/media/catalog/product/cache/image/700x560/91bbed04eb86c2a8aaef7fbfb2041b2a/f/i/file_122_1.jpg',
            'rented' => false,
            'synopsis' => 'Tony Montana es un emigrante cubano frío y sanguinario que se instala en Miami con el propósito de convertirse en un gángster importante. Con la colaboración de su amigo Manny Rivera inicia una fulgurante carrera delictiva con el objetivo de acceder a la cúpula de una organización de narcos.'
        ),
        array(
            'title' => 'El pianista',
            'year' => '2002',
            'director' => 'Roman Polanski',
            'poster' => 'data:image/jpeg;base64,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',
            'rented' => true,
            'synopsis' => 'Wladyslaw Szpilman, un brillante pianista polaco de origen judío, vive con su familia en el ghetto de Varsovia. Cuando, en 1939, los alemanes invaden Polonia, consigue evitar la deportación gracias a la ayuda de algunos amigos. Pero tendrá que vivir escondido y completamente aislado durante mucho tiempo, y para sobrevivir tendrá que afrontar constantes peligros.'
        ),
        array(
            'title' => 'Seven',
            'year' => '1995',
            'director' => 'David Fincher',
            'poster' => 'http://4.bp.blogspot.com/-QNXDF2HIelY/T9MUqPy50TI/AAAAAAAAAL0/PHjxjtPpjIM/s1600/Seven.jpg',
            'rented' => true,
            'synopsis' => 'El veterano teniente Somerset (Morgan Freeman), del departamento de homicidios, está a punto de jubilarse y ser reemplazado por el ambicioso e impulsivo detective David Mills (Brad Pitt). Ambos tendrán que colaborar en la resolución de una serie de asesinatos cometidos por un psicópata que toma como base la relación de los siete pecados capitales: gula, pereza, soberbia, avaricia, envidia, lujuria e ira. Los cuerpos de las víctimas, sobre los que el asesino se ensaña de manera impúdica, se convertirán para los policías en un enigma que les obligará a viajar al horror y la barbarie más absoluta.'
        ),
        array(
            'title' => 'El silencio de los corderos',
            'year' => '1991',
            'director' => 'Jonathan Demme',
            'poster' => 'https://i.pinimg.com/originals/b5/0b/1c/b50b1c06978f01fcdee244ef181cb805.jpg',
            'rented' => false,
            'synopsis' => 'El FBI busca a "Buffalo Bill", un asesino en serie que mata a sus víctimas, todas adolescentes, después de prepararlas minuciosamente y arrancarles la piel. Para poder atraparlo recurren a Clarice Starling, una brillante licenciada universitaria, experta en conductas psicópatas, que aspira a formar parte del FBI. Siguiendo las instrucciones de su jefe, Jack Crawford, Clarice visita la cárcel de alta seguridad donde el gobierno mantiene encerrado a Hannibal Lecter, antiguo psicoanalista y asesino, dotado de una inteligencia superior a la normal. Su misión será intentar sacarle información sobre los patrones de conducta de "Buffalo Bill".'
        ),
        array(
            'title' => 'La naranja mecánica',
            'year' => '1971',
            'director' => 'Stanley Kubrick',
            'poster' => 'https://m.media-amazon.com/images/I/41QTGi5SrlL._AC_SS350_.jpg',
            'rented' => false,
            'synopsis' => 'Gran Bretaña, en un futuro indeterminado. Alex (Malcolm McDowell) es un joven muy agresivo que tiene dos pasiones: la violencia desaforada y Beethoven. Es el jefe de la banda de los drugos, que dan rienda suelta a sus instintos más salvajes apaleando, violando y aterrorizando a la población. Cuando esa escalada de terror llega hasta el asesinato, Alex es detenido y, en prisión, se someterá voluntariamente a una innovadora experiencia de reeducación que pretende anular drásticamente cualquier atisbo de conducta antisocial.'
        ),
        array(
            'title' => 'La chaqueta metálica',
            'year' => '1987',
            'director' => 'Stanley Kubrick',
            'poster' => 'https://images-na.ssl-images-amazon.com/images/I/71GOnm9aNKL._SX342_.jpg',
            'rented' => true,
            'synopsis' => 'Un grupo de reclutas se prepara en Parish Island, centro de entrenamiento de la marina norteamericana. Allí está el sargento Hartman, duro e implacable, cuya única misión en la vida es endurecer el cuerpo y el alma de los novatos, para que puedan defenderse del enemigo. Pero no todos los jóvenes están preparados para soportar sus métodos. '
        ),
        array(
            'title' => 'Blade Runner',
            'year' => '1982',
            'director' => 'Ridley Scott',
            'poster' => 'https://i.pinimg.com/originals/45/23/47/4523478b464ec21bc0eea0f4c3369faa.jpg',
            'rented' => true,
            'synopsis' => 'A principios del siglo XXI, la poderosa Tyrell Corporation creó, gracias a los avances de la ingeniería genética, un robot llamado Nexus 6, un ser virtualmente idéntico al hombre pero superior a él en fuerza y agilidad, al que se dio el nombre de Replicante. Estos robots trabajaban como esclavos en las colonias exteriores de la Tierra. Después de la sangrienta rebelión de un equipo de Nexus-6, los Replicantes fueron desterrados de la Tierra. Brigadas especiales de policía, los Blade Runners, tenían órdenes de matar a todos los que no hubieran acatado la condena. Pero a esto no se le llamaba ejecución, se le llamaba "retiro". '
        ),
        array(
            'title' => 'Taxi Driver',
            'year' => '1976',
            'director' => 'Martin Scorsese',
            'poster' => 'https://alternativemovieposters.com/wp-content/uploads/2013/04/taxidriverbg2.jpg',
            'rented' => false,
            'synopsis' => 'Para sobrellevar el insomnio crónico que sufre desde su regreso de Vietnam, Travis Bickle (Robert De Niro) trabaja como taxista nocturno en Nueva York. Es un hombre insociable que apenas tiene contacto con los demás, se pasa los días en el cine y vive prendado de Betsy (Cybill Shepherd), una atractiva rubia que trabaja como voluntaria en una campaña política. Pero lo que realmente obsesiona a Travis es comprobar cómo la violencia, la sordidez y la desolación dominan la ciudad. Y un día decide pasar a la acción.'
        ),
        array(
            'title' => 'El club de la lucha',
            'year' => '1999',
            'director' => 'David Fincher',
            'poster' => 'http://es.web.img3.acsta.net/c_215_290/medias/nmedia/18/69/04/88/20140966.jpg',
            'rented' => true,
            'synopsis' => 'Un joven hastiado de su gris y monótona vida lucha contra el insomnio. En un viaje en avión conoce a un carismático vendedor de jabón que sostiene una teoría muy particular: el perfeccionismo es cosa de gentes débiles; sólo la autodestrucción hace que la vida merezca la pena. Ambos deciden entonces fundar un club secreto de lucha, donde poder descargar sus frustaciones y su ira, que tendrá un éxito arrollador.'
        )
    );

}