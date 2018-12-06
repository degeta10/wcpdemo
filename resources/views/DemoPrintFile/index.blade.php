@extends('layouts.app')

@section('title','Print Known File Formats')

@section('body')

<div class="container">
    <div class="row">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingTwo">
                        <h4 class="panel-title">
                            <a class="collapsed btn btn-info btn-lg" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Test Printing Now!
                            </a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                        <div class="panel-body">
                            <p>
                                The following are pre-selected files to test WebClientPrint File Printing feature.
                            </p>
                            <div class="row">
                                <div class="col-md-4 col-md-offset-2">
                                    <hr />
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" id="useDefaultPrinter" />
                                            <strong>Print to Default printer</strong> or...
                                        </label>
                                    </div>
                                    <div id="loadPrinters">
                                        Click to load and select one of the installed printers!
                                        <br />
                                        <a onclick="javascript:jsWebClientPrint.getPrinters();" class="btn btn-success">Load installed printers...</a>
                                        <br />
                                        <br />
                                    </div>
                                    <div id="installedPrinters" style="visibility: hidden">
                                        <label for="installedPrinterName">Select an installed Printer:</label>
                                        <select name="installedPrinterName" id="installedPrinterName" class="form-control"></select>
                                        <select id="printerlist" class="form-control"></select>

                                    </div>
                                    <script type="text/javascript">
                                        //var wcppGetPrintersDelay_ms = 0;
                                        var wcppGetPrintersTimeout_ms = 10000; //10 sec
                                        var wcppGetPrintersTimeoutStep_ms = 500; //0.5 sec
                                        function wcpGetPrintersOnSuccess() {
                                            // Display client installed printers
                                            if (arguments[0].length > 0) {
                                                var p = arguments[0].split("|");
                                                var options = '';
                                               
                                                for (var i = 0; i < p.length; i++) {
                                                    options += '<option>'+p[i]+'</option>';
                                                
                                                }
                                                $('#installedPrinters').css('visibility', 'visible');
                                                $('#installedPrinterName').html(options);
                                                $('#installedPrinterName').focus();
                                                $('#loadPrinters').hide();
                                                
                                            } else {
                                                alert("No printers are installed in your system.");
                                            }
                                        }
                                        function wcpGetPrintersOnFailure() {
                                            // Do something if printers cannot be got from the client
                                            alert("No printers are installed in your system.");
                                        }
                                    </script>
                                </div>
                                <div class="col-md-4">
                                    <hr />
                                    <div id="fileToPrint">
                                        {{-- <label for="ddlFileType">Select a sample File to print:</label>
                                        <select id="ddlFileType" class="form-control">
                                            <option>PDF</option>
                                            <option>TXT</option>
                                            <option>DOC</option>
                                            <option>XLS</option>
                                            <option>JPG</option>
                                            <option>PNG</option>
                                            <option>TIF</option>
                                        </select> --}}
                                        <br />
                                        {{-- <a class="btn btn-success btn-lg" onclick="javascript:jsWebClientPrint.print('useDefaultPrinter=' + $('#useDefaultPrinter').attr('checked') + '&printerName=' + encodeURIComponent($('#installedPrinterName').val()) + '&filetype=' + $('#ddlFileType').val());">Print File...</a> --}}
                                        {{-- <a class="btn btn-success btn-lg" onclick="javascript:jsWebClientPrint.print('useDefaultPrinter=' + $('#useDefaultPrinter').attr('checked') + '&printerName=' + encodeURIComponent($('#installedPrinterName').val()) + '&filetype=PNG');">Print File</a> --}}
                                        {{-- <a class="btn btn-success btn-lg" onclick="javascript:jsWebClientPrint.print('&printerName=' + encodeURIComponent('HP Deskjet 1510 series') + '&filetype=PNG');">Print File</a> --}}
                                        <a id="print_button" class="btn btn-success btn-lg" onclick="printall()">Print File</a>

                                        {{-- <option>HP Deskjet 1510 series</option>
                                        <option>GP-80160(Cut) Series </option> --}}
                                    </div>
                                </div>
                            </div>
                            <h5>File Preview</h5>
                            <iframe id="ifPreview" style="width: 100%; height: 500px;" frameborder="0"></iframe>

                        </div>
                    </div>
                </div>

            </div>
            
        
    </div>
</div>


@endsection

@section('scripts')

{!! 

// Register the WebClientPrint script code
// The $wcpScript was generated by DemoPrintFileController@index

$wcpScript;

!!}

<script type="text/javascript">
        function printall()
        {
            var printers=[];
            $("#installedPrinterName option").each(function () {    
                printers.push($(this).text());
            }); 
            // for (var item in printers) {
            //     jsWebClientPrint.print('&printerName=' + encodeURIComponent(printers[item]) + '&filetype=TXT');
            // }
            //     jsWebClientPrint.print('&printerName=' + encodeURIComponent(printers[item]) + '&filetype=TXT');
            // jsWebClientPrint.print('&printerName=' + printers[0] + '&filetype=TXT');
            // jsWebClientPrint.print('&printerName=' + printers[1] + '&filetype=TXT');
            jsWebClientPrint.print('&printerNames=' + encodeURIComponent(printers[0]) + '&filetype=TXT');
            // jsWebClientPrint.print('&printerName=' + encodeURIComponent(printers[1]) + '&filetype=TXT');
            
            //console.log( printers.length);
            // setTimeout(function () {
            //  },2000);
            // priintername=printers[0];
            //         jsWebClientPrint.print('&printerName=' + encodeURIComponent(priintername) + '&filetype=TXT');
            //         priintername=printers[1];
            //         jsWebClientPrint.print('&printerName=' + encodeURIComponent(priintername) + '&filetype=TXT');
        //    for (var i = 0; i < 2; i++) {
                
        //          //setTimeout(function () {
        //              priintername=printers[0];
        //             jsWebClientPrint.print('&printerName=' + encodeURIComponent(priintername) + '&filetype=TXT');
        //             priintername=printers[1];
        //             jsWebClientPrint.print('&printerName=' + encodeURIComponent(priintername) + '&filetype=TXT');
        //             console.log(priintername);
        //             // alert("hello");
        //          //},5000);
               
        //     };
        }
</script>
@endsection