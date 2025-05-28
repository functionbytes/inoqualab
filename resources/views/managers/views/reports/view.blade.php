@extends('layouts.managers')
                     
@section('content')
    
<script src="{{ asset('manager/assets/plugins/jquery/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('manager/assets/plugins/owl-carousel/owl.carousel.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('manager/assets/js/galeries.js') }}" type="text/javascript"></script>


      <div class="content ">

          <br></br>

           <div class=" no-padding container-fixed-lg bg-white">
            <div class="container">
              <div class="row">

                <div class="col-md-5">
                  <div class="card card-transparent">
                    <div class="card-header ">
                      <div class="card-title">Blogs
                      </div>
                    </div>
                    <div class="card-block">
                      <h3>Editar Blogs</h3>
                      
                    </div>
                  </div>
                </div>

                <div class="col-md-7">


                      <div class="card card-transparent">
                          <div class="card-block">
                          
                            @if ($blog->hasThumbnail()) 
                                <div class="p-b-20 p-t-20" >
                                    <div class="item-details">
                                        <div class="dialog__content">
                                          <div class="container-fluid">
                                            <div class="row dialog__overview">
                                              <div class="col-md-12 no-padding item-slideshow-wrapper full-height">
                                                <div class="item-slideshow full-height owl-carousel">
                                                    @if ($blog->hasThumbnail()) 
                                                          <div class="slide" data-image="/pages/imgs/blogs/{{ $blog->thumbnail()->filename }}">
                                                          </div>
                                                    @endif     
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                              </div>
                              @endif  

                              <div class="form-group-attached">
      
                                                        <div class="row clearfix">
                                                          <div class="col-md-12">
                                                            <div class="form-group form-group-default disabled">
                                                              <label>Titulo</label>
                                                              {!! Form::text('name', $blog->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'required' , 'disabled']) !!}
                                                              @if ($errors->has('name'))
                                                                <span class="invalid-feedback">{{ $errors->first('name') }}</span>
                                                              @endif
                                                            </div>
                                                          </div>  
                                                        </div>
      
                                                        <div class="row clearfix">                            
                                                          <div class="col-md-6">
                                                            <div class="form-group form-group-default form-group-default-select2 disabled">
                                                              <label>Modalidad</label>
                                                              {!! Form::select('categorie_id', $categories, $categorie , ['class' => 'full-width select','type' => 'text' ,'name' => 'categorie_id' ,'id' => 'categorie_id' , 'data-init-plugin' => 'select2' , 'disabled']) !!} 
                                                                @if ($errors->has('categorie_id'))
                                                                     <span class="invalid-feedback">{{ $errors->first('categorie_id') }}</span>
                                                               @endif
                                                             </div>
                                                          </div>
                                                          
                                                          <div class="col-md-6">
                                                              <div class="form-group form-group-default input-group disabled">
                                                                <div class="form-input-group">
                                                                  <label class="inline">Estado</label>
                                                                </div>
                                                                <div class="input-group-append h-c-50">
                                                                  <span class="input-group-text transparent "> 
                                                                      @if($blog->available == 1)                                                       
                                                                          <input type="checkbox" id="available" class="switchery" name="available" data-init-plugin="switchery" data-size="small" checked="checked"  disabled="disabled"/>
                                                                        @else
                                                                          <input type="checkbox" id="available"  class="switchery" name="available"  data-init-plugin="switchery" data-size="small" checked="checked"  disabled="disabled"/>
                                                                        @endif                                                                      
                                                                  </span>
                                                                </div>
                                                              </div>
                                                          </div>
                                                        </div> 
                                                        <div class="row clearfix">
                                                            <div class="col-md-12">              
                                                                  <div class="form-group form-group-default form-group-default-select2 disabled">
                                                                        <label>Tags</label>
                                                                        {!! Form::select('tags[]', $tags, $tag, ['class' => 'full-width select' , 'data-init-plugin' => 'select2' , 'multiple' => 'multiple' , 'disabled']) !!}  
                                                                        @if ($errors->has('tags'))
                                                                               <span class="invalid-feedback">{{ $errors->first('tags') }}</span>   
                                                                         @endif
                                                                  </div>
                                                            </div>    
                                                        </div>   
                                                        <div class="row">
                                                          <div class="col-md-12">
                                                            <div class="form-group form-group-default input-group disabled">
                                                              <div class="form-input-group">
                                                                <label>Contenido</label>
                                                                {!! Form::textarea('content', $blog->content, ['style' => 'margin-top: -2px; margin-bottom: 3px; height: 150px;' ,'class' => 'form-control' . ($errors->has('content') ? ' is-invalid' : ''), 'required' => 'required' , 'disabled']) !!}
      
                                                                @if ($errors->has('content'))
                                                                    <span class="invalid-feedback">{{ $errors->first('content') }}</span>
                                                                @endif
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                        <div class="row">
                                                          <div class="col-md-12">
                                                            <div class="form-group form-group-default input-group disabled">
                                                              <div class="form-input-group">
                                                                <label>Descripcion</label>
                                                                {!! Form::textarea('description', $blog->description, ['style' => 'margin-top: -2px; margin-bottom: 3px; height: 150px;' ,'class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'required' => 'required' , 'disabled']) !!}
      
                                                                @if ($errors->has('description'))
                                                                    <span class="invalid-feedback">{{ $errors->first('description') }}</span>
                                                                @endif
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>
                              </div>
      
                          </div>
                        </div>

            
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
      </div>

      
@endsection

