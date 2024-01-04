@extends('layouts.default')
@section('content')
<div class="FAQ-page" id="FAQ-page wrapper">
@include('includes.header')
<div class="faq-banner mb-5 py-lg-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-7">
                        <h1 class="text-center text-md-start">Frequently Asked Questions</h1>
                        <p class="text-center text-md-start position-relative">Learn more about how we've helped clients hit or exceed their goals</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="faq-section mb-5 py-lg-5">
            <div class="container">   
                <div class="row">
                    <div class="col-12 col-lg-3 left-bar d-flex flex-column">
                        <?php

use App\Models\FaqsModel;

 $c=0; ?>
                        @foreach($faqs as $faqKey => $faqVal)
                        <button class="tablinks text-start border-0 bg-transparent px-0 accordion" onclick="openTab(event, '{{$faqKey}}') , openAccordian(event , '{{$faqKey}}')">{{$faqKey}}</button>
                        <div id="{{$faqKey}}Accordian" class="Accordiancontent py-4" style="display:<?=($c>0?'none':'block')?>">
                            <ul>
                                <?php $c++;?>
                                @foreach($faqVal as $v)
                                    <li>{{$v->title??''}}</li>
                                @endforeach
                                </ul>  
                            </div>
                    @endforeach
                    </div>
                    <div class="col-12 col-lg-9 right-bar">
                    <?php $tbcontent=0; ?>
                    @foreach($faqs as $faqKey => $faqVal)
                        <div id="{{$faqKey}}" class="tabcontent" style="display:<?=($tbcontent>0?'none':'block')?>">
                             <h2 class="d-none d-md-block pb-4">{{$faqKey}}</h2>
                             @foreach($faqVal as $v)
                            <div class="trials-accordian mb-4 py-lg-2">
                                <h3>{{$v->title}}</h3>
                                <?php $dat = FaqsModel::where('faq_subhead_id', $v->id)->get(); ?>
                                <?php //var_dump($dat); ?>
                                <div class="accordion" id="accordionExample2{{$v->id}}">
                                    @foreach($dat as $d)
                                    <div class="accordion-item bg-transparent mb-4">
                                        <div class="accordion-header bg-transparent" id="RheadingOne{{$d->id}}">
                                            <button class="accordion-button p-3 bg-transparent" type="button" data-bs-toggle="collapse" data-bs-target="#RcollapseOne{{$d->id}}" aria-expanded="true" aria-controls="RcollapseOne">
                                                <div class="row w-100 d-flex align-items-center">
                                                    <div class="col-12">
                                                        <span>{{date('d M Y', strtotime($d->created_at))}}.  5 AMIN READ</span>
                                                        <h4 class="mb-0">{{$d->question}}</h4>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                        <div id="RcollapseOne{{$d->id}}" class="accordion-collapse collapse show border-top" aria-labelledby="RheadingOne{{$d->id}}" data-bs-parent="#accordionExample2{{$v->id}}">
                                            <div class="accordion-body">
                                                <p>
                                                {{$d->answer}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <?php $tbcontent++; ?>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        @include('includes.testimonials')
        @include('includes.newsletter')
        @include('includes.footer')
    </div>
    @stop


