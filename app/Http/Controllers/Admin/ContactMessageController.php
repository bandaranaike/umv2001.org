<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class ContactMessageController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Admin/ContactMessages/Index', [
            'messages' => ContactMessage::query()
                ->latest()
                ->paginate(15),
        ]);
    }

    public function markAsRead(ContactMessage $contactMessage): RedirectResponse
    {
        $contactMessage->update(['is_read' => true]);

        return back()->with('toast', ['type' => 'success', 'message' => 'Message marked as read.']);
    }

    public function destroy(ContactMessage $contactMessage): RedirectResponse
    {
        $contactMessage->delete();

        return back()->with('toast', ['type' => 'success', 'message' => 'Message deleted.']);
    }
}
