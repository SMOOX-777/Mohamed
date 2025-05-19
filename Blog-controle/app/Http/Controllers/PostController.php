<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user', 'comments'])->latest()->paginate(10);
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|max:255',
        'content' => 'required',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    // Créer un nouveau post
    $post = new Post();
    $post->title = $validated['title'];
    $post->content = $validated['content'];
    $post->user_id = Auth::id();

    if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
        $photoPath = $request->file('photo')->store('posts', 'public');
        $post->photo = $photoPath; // Assigner directement la propriété
    }

    $post->save(); // Sauvegarder explicitement

    return redirect()->route('posts.index')
        ->with('success', 'Post created successfully.');
}



    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();
        return redirect()->route('posts.index')
            ->with('success', 'Post deleted successfully.');
    }

    public function dashboard()
    {
        $stats = [
            'total_posts' => Post::count(),
            'total_users' => DB::table('users')->count(),
            'total_comments' => DB::table('comments')->count(),
            'posts_today' => Post::whereDate('created_at', today())->count(),
            'posts_this_week' => Post::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count(),
            'posts_this_month' => Post::whereMonth('created_at', now()->month)->count(),
            'recent_posts' => Post::with(['user', 'comments'])
                                ->latest()
                                ->take(5)
                                ->get(),
            'popular_posts' => Post::withCount('comments')
                                ->orderBy('comments_count', 'desc')
                                ->take(5)
                                ->get(),
            'monthly_posts' => Post::select(DB::raw('COUNT(*) as count'), DB::raw('MONTH(created_at) as month'))
                                ->whereYear('created_at', date('Y'))
                                ->groupBy('month')
                                ->get(),
            'top_users' => DB::table('users')
                                ->join('posts', 'users.id', '=', 'posts.user_id')
                                ->select('users.name', DB::raw('COUNT(posts.id) as posts_count'))
                                ->groupBy('users.id', 'users.name')
                                ->orderByDesc('posts_count')
                                ->take(5)
                                ->get(),
            'engagement_rate' => DB::table('posts')
                                ->leftJoin('comments', 'posts.id', '=', 'comments.post_id')
                                ->select(DB::raw('ROUND(COUNT(DISTINCT comments.id) * 100.0 / COUNT(DISTINCT posts.id), 2) as rate'))
                                ->first()
        ];

        return view('dashboard.index', compact('stats'));
    }
}