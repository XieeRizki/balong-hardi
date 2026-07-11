@extends('layouts.app')

@section('title', $blogPost->title . ' - Balong Hardi Sumedang')

@section('content')

    <x-detail-page
        :title="$blogPost->title"
        :badge="$blogPost->category"
        :image="$blogPost->image"
        :meta="'Dipublikasikan ' . $blogPost->published_at?->translatedFormat('d F Y')"
        :backUrl="route('home') . '#blog'"
        backLabel="Kembali ke Blog"
    >
        <div class="prose prose-lg max-w-none prose-headings:text-secondary prose-a:text-primary">
            {!! nl2br(e($blogPost->content)) !!}
        </div>
    </x-detail-page>

@endsection