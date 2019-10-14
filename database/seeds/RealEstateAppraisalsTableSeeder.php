<?php

use Illuminate\Database\Seeder;

class RealEstateAppraisalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('real_estate_appraisals')->insert([
                [
                    'page_title_en' => 'The wide-ranging real estate',
                    'text_title_en' => 'A single interlocutor',
                    'description_en' => 'Lorem ipsum dolor sit amet, lest the roast with an appetite for democritum use of it, and this is sadipscing per no. I say things as with the use sea when it was the least efficient. The bad offices. , And because the stories about the cu, not one of the two feugait has ad. I understand football seasons efficient power from its own mistaken for something similar, biochemical bodies and mine. To my way of electram be related, pain leaving aside the question sea at the Greek honey from one wants. Now to him he wishes to inn scared.',
                    'page_title_it' => 'L`immobiliare ad ampio raggio',
                    'text_title_it' => 'Un unico interlocutore',
                    'description_it' => 'Lorem ipsum dolor sit amet, per timore che larrosto con un appetito per luso democritum di esso, e questo è sadipscing per ogni n. Io dico le cose come con il mare luso quando era il meno efficiente. I cattivi uffici. E perché le storie circa il cu, non uno dei due feugait ha annuncio. Capisco stagioni sportive potenza efficiente dalla propria scambiato per qualcosa di simile, corpi biochimici e la mia. A mio modo di electram essere correlato, il dolore lasciando da parte il mare domanda al miele greco si vuole. Ora a lui che vuole inn paura.',
                    'page_title_de' => 'Die vielfältigen Immobilien',
                    'text_title_de' => 'Ein einziger Gesprächspartner',
                    'description_de' => 'Lorem ipsum dolor sit amet, damit der Braten mit Appetit auf democritum Gebrauch davon, und dies wird pro nicht sadipscing. Ich sage Dinge wie bei der Verwendung Meer, wenn es am wenigsten effizient ist. Die schlechten Büros. Und weil die Geschichten über die cu, nicht einer der beiden feugait hat Anzeige. Ich verstehe Fußball Jahreszeit effiziente Leistung von seinem eigenen verwechselt etwas ähnliches, biochemische Körper und meint. Zu meiner Art von electram in Beziehung gesetzt werden, so dass Schmerzen die Frage Meer an dem griechischen Honig abgesehen von einem will. Nun zu ihm, er möge inn Angst.',

                ],
            ]
        );
    }
}
