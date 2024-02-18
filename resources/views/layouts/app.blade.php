<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap4.min.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/select/1.7.0/css/select.dataTables.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/css/adminlte.min.css" integrity="sha512-IuO+tczf4J43RzbCMEFggCWW5JuX78IrCJRFFBoQEXNvGI6gkUw4OjuwMidiS4Lm9Q2lILzpJwZuMWuSEeT9UQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}" />
        @yield('styles')
    </head>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                            {{ strtoupper(app()->getLocale()) }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
                            @foreach(config('panel.available_languages') as $langLocale => $langName)
                            <a href="{{ url()->current() }}?change_language={{ $langLocale }}" class="dropdown-item">
                                {{ strtoupper($langLocale) }} ({{ $langName }})
                            </a>
                            @endforeach
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" style="left: inherit; right: 0px;">
                            <a href="{{ route('admin.profile.show') }}" class="dropdown-item">
                                <i class="mr-2 fas fa-file"></i>
                                {{ __('My profile') }}
                            </a>
                            <div class="dropdown-divider"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); this.closest('form').submit();">
                                    <i class="mr-2 fas fa-sign-out-alt"></i>
                                    {{ __('Log Out') }}
                                </a>
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="/" class="brand-link">
                    <img src="{{ asset('images/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: 0.8;" />
                    <span class="brand-text font-weight-light">{{ config('app.name', 'Laravel') }}</span>
                </a>
                @include('layouts.navigation')
            </aside>
            <div class="content-wrapper">
                @yield('content')
            </div>
            <!--
            <aside class="control-sidebar control-sidebar-dark">
                <div class="p-3">
                    <h5>Title</h5>
                    <p>Sidebar content</p>
                </div>
            </aside>
            -->
            <footer class="main-footer">
                <div class="float-right d-none d-sm-inline">
                    {{ config('app.env') }}
                </div>
                <strong>&copy; {{ now()->year }} <a class="badge badge-pill badge-dark" href="{{ config('app.url') }}">{{ config('app.name') }}</a>.</strong>
            </footer>
        </div>
        @vite('resources/js/app.js')
        <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js" defer></script>
        <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js" defer></script>
        <script src="//cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js" defer></script>
        <script src="//cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap4.min.js" defer></script>
        <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js" defer></script>
        <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js" defer></script>
        <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.colVis.min.js" defer></script>
        <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.2.7/build/pdfmake.min.js" defer></script>
        <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.2.7/build/vfs_fonts.js" defer></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js" defer></script>
        <script src="https://cdn.datatables.net/select/1.7.0/js/dataTables.select.min.js" defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js" integrity="sha512-RtZU3AyMVArmHLiW0suEZ9McadTdegwbgtiQl5Qqo9kunkVg1ofwueXD8/8wv3Af8jkME3DDe3yLfR8HSJfT2g==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/js/adminlte.min.js" integrity="sha512-KBeR1NhClUySj9xBB0+KRqYLPkM6VvXiiWaSz/8LCQNdRpUm38SWUrj0ccNDNSkwCD9qPA4KobLliG26yPppJA==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
        <script src="{{ asset('js/main.js') }}" defer></script>
        <script type="module">
            $(function() {
                let copyButtonTrans = '{{ trans('global.datatables.copy') }}'
                let csvButtonTrans = '{{ trans('global.datatables.csv') }}'
                let excelButtonTrans = '{{ trans('global.datatables.excel') }}'
                let pdfButtonTrans = '{{ trans('global.datatables.pdf') }}'
                let printButtonTrans = '{{ trans('global.datatables.print') }}'
                let colvisButtonTrans = '{{ trans('global.datatables.colvis') }}'
                let selectAllButtonTrans = '{{ trans('global.select_all') }}'
                let selectNoneButtonTrans = '{{ trans('global.deselect_all') }}'

                let languages = {
                    'en': '//cdn.datatables.net/plug-ins/1.13.7/i18n/en-GB.json',
                    'zh_TW': '//cdn.datatables.net/plug-ins/1.13.7/i18n/zh-HANT.json'
                };

                $.extend(true, $.fn.dataTable.Buttons.defaults.dom.button, { className: 'btn' })
                $.extend(true, $.fn.dataTable.defaults, {
                language: {
                    url: languages['{{ app()->getLocale() }}']
                },
                columnDefs: [{
                    orderable: false,
                    className: 'select-checkbox',
                    targets: 0
                }, {
                    orderable: false,
                    searchable: false,
                    targets: -1
                }],
                select: {
                    style:    'multi+shift',
                    selector: 'td:first-child'
                },
                order: [],
                scrollX: true,
                pageLength: 100,
                dom: 'lBfrtip<"actions">',
                buttons: [
                    {
                        extend: 'selectAll',
                        className: 'btn-primary',
                        text: selectAllButtonTrans,
                        exportOptions: {
                            columns: ':visible'
                        },
                        action: function(e, dt) {
                            e.preventDefault()
                            dt.rows().deselect();
                            dt.rows({ search: 'applied' }).select();
                        }
                    },
                    {
                        extend: 'selectNone',
                        className: 'btn-primary',
                        text: selectNoneButtonTrans,
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'copy',
                        className: 'btn-light',
                        text: copyButtonTrans,
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'csv',
                        className: 'btn-light',
                        text: csvButtonTrans,
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'excel',
                        className: 'btn-light',
                        text: excelButtonTrans,
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'pdf',
                        className: 'btn-light',
                        text: pdfButtonTrans,
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'print',
                        className: 'btn-light',
                        text: printButtonTrans,
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'colvis',
                        className: 'btn-light',
                        text: colvisButtonTrans,
                        exportOptions: {
                            columns: ':visible'
                        }
                    }
                ]
                });

                $.fn.dataTable.ext.classes.sPageButton = '';
            });
        </script>
        @yield('scripts')
    </body>
</html>