<?php

namespace App\Http\Controllers\Transporter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Feedback;
use App\Http\Controllers\WebController;
use App\Message;
use App\QuoteByTransporter;
use App\Thread;
use App\User;
use App\UserQuote;
use App\Watchlist;
use App\Notification;
use Carbon\Carbon;
use App\Services\EmailService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\App;

class WatchlistController extends Controller
{

    public function watchlistIndex()
    {
        $userId = Auth::id();

        // Fetch the watchlist for this user
        $watchlist = UserQuote::whereHas('watchlists', function ($query) use ($userId) {
            $query->where('user_id', $userId); // Filter by the user's watchlist
        })
        // ->with('watchlists') // Ensure you're loading the related watchlists
        ->addSelect([
            'transporter_quotes_count' => QuoteByTransporter::selectRaw('COUNT(*)')
                ->whereColumn('user_quote_id', 'user_quotes.id'), // Match the user_quote_id to the Quote model's ID
            'lowest_bid' => QuoteByTransporter::selectRaw('MIN(CAST(transporter_payment AS UNSIGNED))')
                ->whereColumn('user_quote_id', 'user_quotes.id') // Match user_quote_id to the Quote model's ID
        ])
        ->whereDate('created_at', '>=', now()->subDays(10))
        ->latest()
        ->paginate(50);
        // return $watchlist;
        return view('transporter.watchlist.index', ['quotes' => $watchlist]);

    }
    public function watchlistStore(Request $request)
    {
        // Validate the request
        $request->validate([
            'quote_id' => 'required',  // Ensure the quote ID exists
        ]);
    
        $userId = auth()->id();  // Get the authenticated user ID
        $quoteId = $request->quote_id;  // Get the quote ID from the request
    
        // Check if the combination of user_id and user_quote_id already exists
        $watchlistExists = Watchlist::where('user_id', $userId)
                                    ->where('user_quote_id', $quoteId)
                                    ->exists();
    
        if ($watchlistExists) {
            // If the watchlist entry already exists, return an appropriate response
            return response()->json([
                'success' => false,
                'message' => 'This quote is already in your watchlist!'
            ], 200);
        }
    
        // If the entry does not exist, create a new watchlist record
        Watchlist::create([
            'user_id' => $userId,
            'user_quote_id' => $quoteId,
        ]);
    
        // Return a success response to the AJAX call
        return response()->json([
            'success' => true,
            'message' => 'Quote successfully added to your watchlist!'
        ], 200);
    }

    public function watchlistRemove(Request $request)
    {
        $request->validate([
            'quote_id' => 'required',  // Ensure the quote ID exists
        ]); 
        $userId = auth()->id();  // Get the authenticated user ID
        $quoteId = $request->quote_id; 
        Watchlist::where('user_id' , $userId)->where('user_quote_id', $quoteId)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Quote successfully removed from your watchlist!'
        ], 200);

       

    }
}
