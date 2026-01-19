<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $books = [
            ['isbn'=>'978-1111111111','title'=>'Advanced Physics','author'=>'Albert Einstein','category_id'=>1,'stock_qty'=>12,'description'=>'An in-depth exploration of modern physics concepts.'],
            ['isbn'=>'978-2222222222','title'=>'Classic Novels','author'=>'Various Authors','category_id'=>2,'stock_qty'=>8,'description'=>'A collection of timeless literature masterpieces.'],
            ['isbn'=>'978-3333333333','title'=>'World History Overview','author'=>'David McCullough','category_id'=>5,'stock_qty'=>20,'description'=>'Covers significant events in global history.'],
            ['isbn'=>'978-4444444444','title'=>'Economics for Beginners','author'=>'Paul Samuelson','category_id'=>4,'stock_qty'=>15,'description'=>'Introduction to basic economic principles and theories.'],
            ['isbn'=>'978-5555555555','title'=>'Sociology Today','author'=>'Anthony Giddens','category_id'=>3,'stock_qty'=>10,'description'=>'Insights into modern social structures and behaviors.'],
            ['isbn'=>'978-6666666666','title'=>'Modern Chemistry','author'=>'Marie Curie','category_id'=>1,'stock_qty'=>10,'description'=>'Fundamentals of chemical reactions and compounds.'],
            ['isbn'=>'978-7777777777','title'=>'English Literature Anthology','author'=>'William Shakespeare','category_id'=>2,'stock_qty'=>7,'description'=>'Selected works from classic English literature.'],
            ['isbn'=>'978-8888888888','title'=>'Political Science 101','author'=>'John Locke','category_id'=>3,'stock_qty'=>12,'description'=>'Introduction to political theories and systems.'],
            ['isbn'=>'978-9999999999','title'=>'Microeconomics Principles','author'=>'Gregory Mankiw','category_id'=>4,'stock_qty'=>14,'description'=>'Basic microeconomics concepts and case studies.'],
            ['isbn'=>'978-1010101010','title'=>'Ancient Civilizations','author'=>'Herodotus','category_id'=>5,'stock_qty'=>16,'description'=>'Study of ancient world societies and cultures.'],
            ['isbn'=>'978-1112131415','title'=>'Artificial Intelligence','author'=>'Stuart Russell','category_id'=>1,'stock_qty'=>9,'description'=>'Foundations of AI and modern applications.'],
            ['isbn'=>'978-1213141516','title'=>'Poetry Collection','author'=>'Emily Dickinson','category_id'=>2,'stock_qty'=>5,'description'=>'A curated collection of timeless poems.'],
            ['isbn'=>'978-1314151617','title'=>'Social Issues in the 21st Century','author'=>'Zygmunt Bauman','category_id'=>3,'stock_qty'=>8,'description'=>'Examines contemporary social problems.'],
            ['isbn'=>'978-1415161718','title'=>'Macroeconomics Explained','author'=>'Paul Krugman','category_id'=>4,'stock_qty'=>13,'description'=>'Introduction to macroeconomic theory and policies.'],
            ['isbn'=>'978-1516171819','title'=>'European History','author'=>'Eric Hobsbawm','category_id'=>5,'stock_qty'=>18,'description'=>'Major events and transformations in Europe.'],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}
