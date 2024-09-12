<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class MaxWords implements Rule
{
    protected $maxWords;

    public function __construct($maxWords)
    {
        $this->maxWords = $maxWords;
    }

    public function passes($attribute, $value)
    {
        // Count the number of words
        return str_word_count($value) <= $this->maxWords;
    }

    public function message()
    {
        return 'The :attribute must not exceed ' . $this->maxWords . ' words.';
    }
}
