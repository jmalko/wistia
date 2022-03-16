<template>
    <div class="wistia_fieldtype_container">
        <div class="flex items-center">
            <div class="input_group">
                <div class="input_group_prepend">URL</div>
                <text-input type="text" id="wistia_url" v-model="data.url" class="input_text flex-1 bg-white" @input="fetchMedia" />
            </div>
        </div>
        <div id="wistia_uploader" style="height:360px; margin-top:20px;"></div>
    </div>
</template>
 
<script>

export default {

    mixins: [Fieldtype],
    data() {
        return {
            data: this.value || {}
        }
    },

    methods: {
        fetchMedia() {

            var wistia_id = this.data.url.split("/").pop();


            if (wistia_id.length != 10) {
                this.data.wistia = {};
                this.updateDebounced(this.data);
                return;
            }

            var hoist = this;
            
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    hoist.data.wistia = JSON.parse(xhttp.responseText);
                    hoist.updateDebounced(hoist.data);
                    return;
                }
            };
            xhttp.open("GET", "https://fast.wistia.com/embed/medias/" + wistia_id + ".json", true);
            xhttp.send();
        }
    },

    mounted() {
        
        // account for < 1.2.1 values

        if ( this.data && typeof this.data === 'string') {
            this.data = {
                url: this.data,
                wistia: {}
            }
        }
        
        const plugin = document.createElement("script");
        plugin.setAttribute(
            "src",
            "//fast.wistia.com/assets/external/api.js"
        );
        plugin.async = true;
        document.head.appendChild(plugin);

        const wistiaStyle = document.createElement("link");
        wistiaStyle.setAttribute(
            "href",
            "//fast.wistia.com/assets/external/uploader.css"
        );
        wistiaStyle.rel = "stylesheet";
        document.head.appendChild(wistiaStyle);

        window._wapiq = window._wapiq || [];

        _wapiq.push((W) => {

            window.wistiaUploader = new W.Uploader({
                accessToken: this.meta.wistiaApi,
                dropIn: "wistia_uploader",
                projectId: this.meta.wistiaProjectId 
            });

            wistiaUploader.bind("uploadembeddable", (file, media, embedCode, oembedResponse) => {
                this.updateDebounced(media.url);
            });

        });
    }
};
</script>
