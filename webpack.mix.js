const mix = require('laravel-mix');
const lodash = require("lodash");
const folder = {
    src: "resources/", // source files
    dist: "public/", // build files
    dist_assets: "public/" //build assets files
};

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

    var third_party_assets = {
        css_js: [
            {"name": "jquery", "assets": ["./node_modules/jquery/dist/jquery.min.js"]},
            {"name": "bootstrap", "assets": ["./node_modules/bootstrap/dist/js/bootstrap.bundle.js"]},
            {"name": "metismenu", "assets": ["./node_modules/metismenu/dist/metisMenu.js"]},
            {"name": "simplebar", "assets": ["./node_modules/simplebar/dist/simplebar.js"]},
            {"name": "node-waves", "assets": ["./node_modules/node-waves/dist/waves.js"]},
            {"name": "select2", "assets": ["./node_modules/select2/dist/js/select2.min.js", "./node_modules/select2/dist/css/select2.min.css"]},
            {"name": "chart-js", "assets": ["./node_modules/chart.js/dist/Chart.bundle.min.js"]},
            {
                "name": "datatables", "assets": ["./node_modules/datatables.net/js/jquery.dataTables.min.js",
                    "./node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js",
                    "./node_modules/datatables.net-responsive/js/dataTables.responsive.min.js",
                    "./node_modules/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js",
                    "./node_modules/datatables.net-buttons/js/dataTables.buttons.min.js",
                    "./node_modules/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js",
                    "./node_modules/datatables.net-buttons/js/buttons.html5.min.js",
                    "./node_modules/datatables.net-buttons/js/buttons.flash.min.js",
                    "./node_modules/datatables.net-buttons/js/buttons.print.min.js",
                    "./node_modules/datatables.net-buttons/js/buttons.colVis.min.js",
                    "./node_modules/datatables.net-keytable/js/dataTables.keyTable.min.js",
                    "./node_modules/datatables.net-keytable-bs4/js/keyTable.bootstrap4.min.js",
                    "./node_modules/datatables.net-autofill-bs4/js/autoFill.bootstrap4.min.js",
                    "./node_modules/datatables.net-select/js/dataTables.select.min.js",
                    "./node_modules/datatables.net-keytable-bs4/css/keyTable.bootstrap4.min.css",
                    "./node_modules/datatables.net-autofill-bs4/css/autoFill.bootstrap4.min.css",
                    "./node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css",
                    "./node_modules/datatables.net-responsive-bs4/css/responsive.bootstrap4.css",
                    "./node_modules/datatables.net-buttons-bs4/css/buttons.bootstrap4.css",
                    "./node_modules/datatables.net-select-bs4/css/select.bootstrap4.css"]
            },
            {"name": "pdfmake", "assets": ["./node_modules/pdfmake/build/pdfmake.min.js", "./node_modules/pdfmake/build/vfs_fonts.js"]},
            {"name": "jszip", "assets": ["./node_modules/jszip/dist/jszip.min.js"]},
            {"name": "curiosityx", "assets": ["./node_modules/@curiosityx/bootstrap-session-timeout/index.js"]},
            {"name": "bootstrap-datepicker", "assets": ["./node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js","./node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css"]},
            {"name": "chance", "assets": ["./node_modules/chance/dist/chance.min.js"]},
            {"name": "gmaps", "assets": ["./node_modules/gmaps/gmaps.min.js"]},
            {"name": "bootstrap-filestyle2", "assets": ["./node_modules/bootstrap-filestyle2/src/bootstrap-filestyle.min.js"]},
            {"name": "bs-custom-file-input", "assets": ["./node_modules/bs-custom-file-input/dist/bs-custom-file-input.min.js"]},
            {"name": "bootstrap-editable", "assets": ["./node_modules/bootstrap-editable/js/index.js", "./node_modules/bootstrap-editable/css/bootstrap-editable.css"]},
            {"name": "rwd-table", "assets": ["./node_modules/admin-resources/rwd-table/rwd-table.min.js", "./node_modules/admin-resources/rwd-table/rwd-table.min.css"]},
            {
                "name": "jquery-vectormap", "assets": ["./node_modules/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js",
                    "./node_modules/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js",
                    "./node_modules/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js",
                    "./node_modules/admin-resources/jquery.vectormap/maps/jquery-jvectormap-au-mill-en.js",
                    "./node_modules/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-il-chicago-mill-en.js",
                    "./node_modules/admin-resources/jquery.vectormap/maps/jquery-jvectormap-in-mill-en.js",
                    "./node_modules/admin-resources/jquery.vectormap/maps/jquery-jvectormap-uk-mill-en.js",
                    "./node_modules/admin-resources/jquery.vectormap/maps/jquery-jvectormap-ca-lcc-en.js",
                    "./node_modules/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css"]
            },
            { "name": "ion-rangeslider", "assets": ["./node_modules/ion-rangeslider/js/ion.rangeSlider.min.js", "./node_modules/ion-rangeslider/css/ion.rangeSlider.min.css"] },
            {"name": "sweetalert2", "assets": ["./node_modules/sweetalert2/dist/sweetalert2.min.js", "./node_modules/sweetalert2/dist/sweetalert2.min.css"]},
            {"name": "jquery-sparkline", "assets": ["./node_modules/jquery-sparkline/jquery.sparkline.min.js"]},
            {"name": "jquery-knob", "assets": ["./node_modules/jquery-knob/dist/jquery.knob.min.js"]},
            {"name": "moment", "assets": ["./node_modules/moment/min/moment.min.js"]},
            {
                "name": "flot-charts", "assets": ["./node_modules/flot-charts/jquery.flot.js",
                    "./node_modules/flot-charts/jquery.flot.time.js",
                    "./node_modules/flot-charts/jquery.flot.resize.js",
                    "./node_modules/flot-charts/jquery.flot.pie.js",
                    "./node_modules/flot-charts/jquery.flot.selection.js",
                    "./node_modules/flot-charts/jquery.flot.stack.js",
                    "./node_modules/flot-charts/jquery.flot.crosshair.js",
                    "./node_modules/jquery.flot.tooltip/js/jquery.flot.tooltip.min.js"]
            },
            {"name": "magnific-popup", "assets": ["./node_modules/magnific-popup/dist/jquery.magnific-popup.min.js", "./node_modules/magnific-popup/dist/magnific-popup.css"]},
            {"name": "parsleyjs", "assets": ["./node_modules/parsleyjs/dist/parsley.min.js"]},
            {"name": "bootstrap-touchspin", "assets": ["./node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js", "./node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css"] },
            {"name": "bootstrap-maxlength", "assets": ["./node_modules/bootstrap-maxlength/dist/bootstrap-maxlength.min.js"]},
            {"name": "bootstrap-colorpicker", "assets": ["./node_modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js", "./node_modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css"]},
            {"name": "summernote", "assets": ["./node_modules/summernote/dist/summernote-bs4.min.js", "./node_modules/summernote/dist/summernote-bs4.css"]},
            {"name": "dropzone", "assets": ["./node_modules/dropzone/dist/min/dropzone.min.js", "./node_modules/dropzone/dist/min/dropzone.min.css"]},
            {"name": "dragula", "assets": ["./node_modules/dragula/dist/dragula.min.js", "./node_modules/dragula/dist/dragula.min.css"]},
            {"name": "jquery-repeater", "assets": ["./node_modules/jquery.repeater/jquery.repeater.min.js"]},
            {"name": "inputmask", "assets": ["./node_modules/inputmask/dist/min/jquery.inputmask.bundle.min.js"]},
            {"name": "c3", "assets": ["./node_modules/c3/c3.min.js", "./node_modules/c3/c3.min.css"]},
            {"name": "chartist", "assets": ["./node_modules/chartist/dist/chartist.min.js", "./node_modules/chartist/dist/chartist.min.css"]},
            {"name": "chartist-plugin-tooltips", "assets": ["./node_modules/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js", "./node_modules/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.css"]},
            {"name": "d3", "assets": ["./node_modules/d3/dist/d3.min.js"]},
            {"name": "flot.curvedlines", "assets": ["./node_modules/curvedLines.js"]},
            {"name": "fullcalendar", "assets": ["./node_modules/fullcalendar/dist/fullcalendar.min.js", "./node_modules/fullcalendar/dist/fullcalendar.min.css"]},
            {"name": "jquery-ui", "assets": ["./node_modules/jquery-ui/jquery-ui.min.js"]},
            {"name": "morris.js", "assets": ["./node_modules/morris.js/morris.min.js"]},
            {"name": "raphael", "assets": ["./node_modules/raphael/raphael.min.js"]}
        ]
    };

	//copying third party assets
    lodash(third_party_assets).forEach(function (assets, type) {
        if (type == "css_js") {
            lodash(assets).forEach(function (plugin) {
                var name = plugin['name'],
                    assetlist = plugin['assets'],
                    css = [],
                    js = [];
                lodash(assetlist).forEach(function (asset) {
                    var ass = asset.split(',');
					for (let i = 0; i < ass.length; ++i) {
                    	if(ass[i].substr(ass[i].length - 3)  == ".js") {
                    		js.push(ass[i]);
                    	} else {
                    		css.push(ass[i]);
                    	}
                	};
                });
            	if(js.length > 0){
            		mix.combine(js, folder.dist_assets + "/libs/" + name + "/" + name + ".min.js");
            	}
            	if(css.length > 0){
            		mix.combine(css, folder.dist_assets + "/libs/" + name + "/" + name + ".min.css");
            	}
            });
        }
    });

    mix.copyDirectory("./node_modules/tinymce", folder.dist_assets + "/libs/tinymce");

    // copy all fonts
    var out = folder.dist_assets + "fonts";
    mix.copyDirectory(folder.src + "fonts", out);

    // copy all images
    var out = folder.dist_assets + "images";
    mix.copyDirectory(folder.src + "images", out);

    mix.sass('resources/scss/bootstrap.scss', folder.dist_assets + "css").minify(folder.dist_assets + "css/bootstrap.css");
    mix.sass('resources/scss/bootstrap-dark.scss', folder.dist_assets + "css").minify(folder.dist_assets + "css/bootstrap-dark.css");
    mix.sass('resources/scss/icons.scss', folder.dist_assets + "css").minify(folder.dist_assets + "css/icons.css");
    mix.sass('resources/scss/app-rtl.scss', folder.dist_assets + "css").minify(folder.dist_assets + "css/app-rtl.css");
    mix.sass('resources/scss/app.scss', folder.dist_assets + "css").minify(folder.dist_assets + "css/app.css");
    mix.sass('resources/scss/app-dark.scss', folder.dist_assets + "css").minify(folder.dist_assets + "css/app-dark.css");

    //copying demo pages related assets
    var app_pages_assets = {
        js: [
            folder.src + "js/pages/c3-chart.init.js",
            folder.src + "js/pages/calendar.init.js",
            folder.src + "js/pages/chartist.init.js",
            folder.src + "js/pages/chartjs.init.js",
            folder.src + "js/pages/dashboard.init.js",
            folder.src + "js/pages/datatables.init.js",
            folder.src + "js/pages/email-summernote.init.js",
            folder.src + "js/pages/flot.init.js",
            folder.src + "js/pages/form-advanced.init.js",
            folder.src + "js/pages/form-editor.init.js",
            folder.src + "js/pages/form-validation.init.js",
            folder.src + "js/pages/form-xeditable.init.js",
            folder.src + "js/pages/gmaps.init.js",
            folder.src + "js/pages/jquery-knob.init.js",
            folder.src + "js/pages/lightbox.init.js",
            folder.src + "js/pages/morris.init.js",
            folder.src + "js/pages/range-sliders.init.js",
            folder.src + "js/pages/session-timeout.init.js",
            folder.src + "js/pages/sparklines.init.js",
            folder.src + "js/pages/sweet-alerts.init.js",
            folder.src + "js/pages/table-editable.int.js",
            folder.src + "js/pages/table-responsive.init.js",
            folder.src + "js/pages/vector-maps.init.js"
        ]
    };

    var out = folder.dist_assets + "js/";
    lodash(app_pages_assets).forEach(function (assets, type) {
		for (let i = 0; i < assets.length; ++i) {
        	mix.js(assets[i], out + "pages");
    	};
    });

    mix.combine('resources/js/app.js', folder.dist_assets + "js/app.min.js");
