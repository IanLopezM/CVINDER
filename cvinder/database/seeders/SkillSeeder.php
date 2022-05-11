<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Skill;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skills = [
            'C', 'C++', 'C#', 'Go', 'Java', 'JavaScript', 'TypeScript', 'PHP', 'Clojure', 'CoffeeScript', 'Elixir',
            'Erlang', 'Haskell', 'Nim', 'Perl', 'Python', 'Ruby', 'Rust', 'Scala', 'Swift', 'Angular', 'Babel', 'Angularjs',
            'Bakcbonejs', 'Bootstrap', 'Tailwind', 'Bulma', 'CSS3', 'Ember', 'Gulp', 'HTML5', 'Materialize', 'Pug', 'Qt', 'React',
            'Redux', 'Sass', 'Svelte', 'Vuejs', 'Vuetify', 'Webpack', 'Express', 'Graphql', 'Hadoop', 'Kafka', 'Nestjs',
            'Nginx', 'Nodejs', 'Openresty', 'RabbitMQ', 'Spring', 'Android', 'Apachecordova', 'Dart', 'Flutter', 'Ionic', 'Kotlin',
            'Nativescript', 'Reactnative', 'Xamarin', 'Cassandra', 'Cockroachdb', 'Couchdb', 'Elasticsearch', 'Hive',
            'Mariadb', 'Mongodb', 'Mssql', 'Mysql', 'Opencv', 'Oracle', 'Pandas', 'PostgreSQL', 'Pytorch', 'Realm', 'Redis',
            'Sqlite', 'AWS', 'Azure', 'Bash', 'Canvasjs', 'Chartjs', 'Docker', 'Grafana', 'Jenkins', 'Kibana', 'Kubernetes',
            'Vagrant', 'Amplify', 'Appwrite', 'Arduino', 'Codeigniter', 'Django', 'Dotnet', 'Electron', 'Firebase', 'Flask',
            'Git', 'Heroku', 'Ifttt', 'Laravel', 'Linux', 'Windows', 'Mocha', 'Postman', 'Quasar', 'Rails', 'Symfony', 'Unity',
            'Unreal', 'Zapier'
        ];

        for ($i = 0; $i < count($skills); $i++) {
            Skill::create([
                'name' => $skills[$i],
            ]);
        }
    }
}
