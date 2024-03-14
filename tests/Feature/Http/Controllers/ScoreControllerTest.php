<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Score;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ScoreController
 */
final class ScoreControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $scores = Score::factory()->count(3)->create();

        $response = $this->get(route('score.index'));
    }
}
