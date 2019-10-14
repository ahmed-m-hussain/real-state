<?php

use Illuminate\Database\Seeder;

class AdministrationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('administrations')->insert([
                [
                    'page_title_en' => 'The wide-ranging real estate',
                    'text_title_en' => 'The right direction',
                    'description_en' => 'Lorem ipsum dolor sit amet, lest the roast with an appetite for democritum use of it, and this is sadipscing per no. I say things as with the use sea when it was the least efficient. The bad offices. , And because the stories about the cu, not one of the two feugait has ad. I understand football seasons efficient power from its own mistaken for something similar, biochemical bodies and mine. To my way of electram be related, pain leaving aside the question sea at the Greek honey from one wants. Now to him he wishes to inn scared.',

                    'page_title_it' => 'The wide-ranging real estate',
                    'text_title_it' => 'La giusta direzione',
                    'description_it' => 'Lorem ipsum dolor si siede amet, per timore che l\'arrosto abbia un appetito per l\'uso democratico di esso, e questo è sadipscing per no. Dico cose come con l\'uso del mare quando era il meno efficiente. I cattivi uffici. E poiché le storie sul cu, nessuno dei due feuga ha una pubblicità. Capisco il potere efficiente delle stagioni calcistiche dal suo stesso errore per qualcosa di simile, corpi biochimici e miei. Al mio modo di collegare l\'elettram, il dolore lascia da parte la domanda mare al miele greco da uno. Ora per lui desidera inn spaventato.',

                    'page_title_de' => 'The wide-ranging real estate',
                    'text_title_de' => 'Die richtige Richtung',
                    'description_de' => 'Lorem ipsum dolor sitzen amet, damit der Braten mit einem Appetit für Democritumgebrauch von ihm, und dieses sadipscing pro Nr. Ich sage Dinge wie beim Einsatz von Meer, als es am wenigsten effizient war. Die schlechten Büros. Und weil die Geschichten über die Cu, hat keiner der beiden Feugait Anzeige. Ich verstehe die effiziente Kraft der Fußballsaison aus eigener Kraft, die mit ähnlichen, biochemischen Körpern und meinen verwechselt wurde. Mit meiner Art der Elektrizität verwandt zu sein, lässt Schmerz die Frage offen, wie man den griechischen Honig abschmecken will. Jetzt möchte er ängstlich sein.',

                ],
            ]
        );
    }
}
