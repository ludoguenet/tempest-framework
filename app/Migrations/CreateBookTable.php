<?php

declare(strict_types=1);

namespace App\Migrations;

use App\Modules\Books\Models\Book;
use Tempest\Database\Builder\IdRow;
use Tempest\Database\Builder\IntRow;
use Tempest\Database\Builder\TableBuilder;
use Tempest\Database\Builder\TextRow;
use Tempest\Interface\Migration;

final readonly class CreateBookTable implements Migration
{
    public function getName(): string
    {
        return '0000-00-00_create_book_table';
    }

    public function up(TableBuilder $builder): TableBuilder
    {
        return $builder
            ->name(Book::table())
            ->add(new IdRow())
            ->add(new TextRow('title'))
            ->add(new IntRow('author_id', nullable: true))
            ->create();
    }

    public function down(TableBuilder $builder): TableBuilder
    {
        return $builder->name(Book::table())->drop();
    }
}
