<?php

namespace App\Mail;

use App\Models\Category;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CategoryUpdateReport extends Mailable
{
    use Queueable, SerializesModels;

    private Category $category;
    /**
     * Create a new message instance.
     *
     * @return void
     */

    public function __construct(Category $category)
    {
        $this->category = $category;
    }


    public function build()
    {
        return $this->view('mail.categoryUpdateReport', ['category' => $this->category]);
    }


}
