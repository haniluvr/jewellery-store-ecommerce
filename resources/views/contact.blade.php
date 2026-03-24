@extends('layouts.app')

@section('title', 'Contact Us — Éclore Maison')

@push('styles')
<style>
    .editorial-hero {
        background: #fbfbfb;
        padding: 12rem 0 8rem 0;
        border-bottom: 1px solid #eee;
    }
    .contact-section {
        padding: 8rem 0;
    }
    .contact-input {
        width: 100%;
        border-bottom: 1px solid #eee;
        padding: 1.5rem 0;
        margin-bottom: 3rem;
        font-family: 'Azeret Mono', monospace;
        font-size: 0.75rem;
        letter-spacing: 0.2rem;
        text-transform: uppercase;
        background: transparent;
        outline: none;
        transition: border-color 0.3s ease;
    }
    .contact-input:focus {
        border-color: #C5B391;
    }
    .contact-label {
        font-family: 'Azeret Mono', monospace;
        font-size: 10px;
        letter-spacing: 0.4rem;
        color: #999;
        text-transform: uppercase;
    }
    .contact-info-card {
        padding: 4rem;
        background: #FAF9F6;
        height: 100%;
    }
    .contact-info-card h3 {
        font-family: 'Playfair Display', serif;
        font-size: 2rem;
        margin-bottom: 2rem;
    }
</style>
@endpush

@section('content')
<main>
    <!-- Hero -->
    <header class="editorial-hero text-center px-6">
        <nav class="mb-12" data-aos="fade-down">
            <span class="font-azeret text-[10px] tracking-[0.4em] text-gray-400 uppercase">Our Maison — Engagement</span>
        </nav>
        <h1 class="font-playfair text-6xl md:text-8xl text-gray-900 mb-8" data-aos="fade-up">Connect With Us</h1>
        <p class="font-azeret text-xs tracking-widest text-gray-400 uppercase max-w-2xl mx-auto leading-loose" data-aos="fade-up" data-aos-delay="100">
            A boutique experience begins with a singular conversation. Our concierge is here to assist with every inquiry.
        </p>
    </header>

    <section class="contact-section bg-white">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-20">
                <!-- Form Side -->
                <div data-aos="fade-right">
                    <h2 class="font-playfair text-4xl mb-12">Submit An Inquiry</h2>
                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div>
                                <label class="contact-label">Given Name</label>
                                <input type="text" name="first_name" required class="contact-input">
                            </div>
                            <div>
                                <label class="contact-label">Family Name</label>
                                <input type="text" name="last_name" required class="contact-input">
                            </div>
                        </div>
                        <div class="mb-12">
                            <label class="contact-label">Email Signature</label>
                            <input type="email" name="email" required class="contact-input">
                        </div>
                        <div class="mb-12">
                            <label class="contact-label">Subject Of Conversation</label>
                            <select name="subject" class="contact-input">
                                <option value="Bespoke Design">Bespoke Design Inquiry</option>
                                <option value="Acquisition Inquiry">Acquisition Inquiry</option>
                                <option value="Corporate Partnerships">Corporate Partnerships</option>
                                <option value="Press & Media">Press & Media</option>
                                <option value="Other">General Inquiries</option>
                            </select>
                        </div>
                        <div class="mb-16">
                            <label class="contact-label">Your Message</label>
                            <textarea name="message" rows="4" required class="contact-input resize-none"></textarea>
                        </div>
                        <button type="submit" class="bg-black text-white px-16 py-6 text-[10px] tracking-[0.4em] uppercase font-bold hover:bg-[#C5B391] transition-all">
                            SEND MESSAGE
                        </button>
                    </form>
                </div>

                <!-- Info Side -->
                <div data-aos="fade-left">
                    <div class="contact-info-card">
                        <h3>Global Flagship</h3>
                        <div class="space-y-12">
                            <div>
                                <h4 class="font-azeret text-[10px] tracking-[0.4em] text-[#C5B391] mb-4 uppercase">Maison Headquarters</h4>
                                <p class="font-azeret text-xs leading-loose text-gray-500 uppercase tracking-widest">
                                    7 Place Vendôme<br>75001 Paris, France
                                </p>
                            </div>
                            <div>
                                <h4 class="font-azeret text-[10px] tracking-[0.4em] text-[#C5B391] mb-4 uppercase">Direct Inquiries</h4>
                                <p class="font-azeret text-xs leading-loose text-gray-500 uppercase tracking-widest">
                                    T: +33 1 23 45 67 89<br>E: <a href="mailto:hello@eclorejewellery.shop" class="hover:text-black transition-colors">hello@eclorejewellery.shop</a>
                                </p>
                            </div>
                            <div>
                                <h4 class="font-azeret text-[10px] tracking-[0.4em] text-[#C5B391] mb-4 uppercase">Concierge Hours</h4>
                                <p class="font-azeret text-xs leading-loose text-gray-500 uppercase tracking-widest">
                                    Monday — Friday<br>09:00 — 18:00 CET
                                </p>
                            </div>
                        </div>

                        <div class="mt-20 border-t border-gray-200 pt-12">
                            <h3 class="text-xl">Media Relations</h3>
                            <p class="font-azeret text-[10px] tracking-widest text-gray-500 uppercase leading-loose">
                                For press materials and global media inquiries, please contact our PR department at press@eclorejewellery.shop.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
