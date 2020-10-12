<div class="block appearance" id="description">
    <div class="block-content block-content-left block-content-2-3">
    <div class="text">{!! $animal['meta']['appearance'] !!}</div>
    </div>
    <div class="taxonomies">
    <ul>
       @foreach ($animal['taxonomies'] as $taxonomy)
        <li itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">
            <span class="type">
                @switch( $taxonomy['type'] )
                    @case( 'infrakingdom' )
                        {{ trans('animal.infrakingdom') }}
                    @breakswitch
                    @case( 'kingdom' )
                        {{ trans('animal.kingdom') }}
                    @breakswitch
                    @case( 'subkingdom' )
                        {{ trans('animal.subkingdom') }}
                    @breakswitch
                    @case( 'superphylum' )
                        {{ trans('animal.superphylum') }}
                    @breakswitch
                    @case( 'infraphylum' )
                        {{ trans('animal.infraphylum') }}
                    @breakswitch
                    @case( 'phylum' )
                        {{ trans('animal.phylum') }}
                    @breakswitch
                    @case( 'subphylum' )
                        {{ trans('animal.subphylum') }}
                    @breakswitch
                    @case( 'microphylum' )
                        {{ trans('animal.microphylum') }}
                    @breakswitch
                    @case( 'superclass' )
                        {{ trans('animal.superclass') }}
                    @breakswitch
                    @case( 'parvclass' )
                        {{ trans('animal.parvclass') }}
                    @breakswitch
                    @case( 'class' )
                        {{ trans('animal.class') }}
                    @breakswitch
                    @case( 'subclass' )
                    {{ trans('animal.subclass') }}
                    @breakswitch
                    @case( 'infraclass' )
                        {{ trans('animal.infraclass') }}
                    @breakswitch
                    @case( 'lehion' )
                        {{ trans('animal.legion') }}
                    @breakswitch
                    @case( 'cohort' )
                        {{ trans('animal.cohort') }}
                    @breakswitch
                    @case( 'superorder' )
                        {{ trans('animal.superorder') }}
                    @breakswitch
                    @case( 'magnoorder' )
                        {{ trans('animal.magnorder') }}
                    @breakswitch
                    @case( 'infraorder' )
                    {{ trans('animal.infraorder') }}
                    @breakswitch
                    @case( 'order' )
                        {{ trans('animal.order') }}
                    @breakswitch
                    @case( 'suborder' )
                    {{ trans('animal.suborder') }}
                    @breakswitch
                    @case( 'parvorder' )
                        {{ trans('animal.parvorder') }}
                    @breakswitch
                    @case( 'superfamily' )
                    {{ trans('animal.superfamily') }}
                    @breakswitch
                    @case( 'family' )
                        {{ trans('animal.family') }}
                    @breakswitch
                    @case( 'subfamily' )
                        {{ trans('animal.subfamily') }}
                    @breakswitch
                    @case( 'supertribe' )
                        {{ trans('animal.supertribe') }}
                    @breakswitch
                    @case( 'tribe' )
                        {{ trans('animal.tribe') }}
                    @breakswitch
                    @case( 'subtribe' )
                        {{ trans('animal.subtribe') }}
                    @breakswitch
                    @case( 'section' )
                        {{ trans('animal.section') }}
                    @breakswitch
                    @case( 'clade' )
                        {{ trans('animal.clade') }}
                    @breakswitch
                    @case( 'genus' )
                        {{ trans('animal.genus') }}
                    @breakswitch
                    @case( 'subgenus' )
                        {{ trans('animal.subgenus') }}
                    @breakswitch
                @endswitch
            </span>

            <a href="/{{ $taxonomy['url'] }}" itemprop="url">
                <span itemprop="title">{{ $taxonomy['name'] }}</span>
            </a>
        </li>
        @endforeach 
    </ul>
   </div>
</div>