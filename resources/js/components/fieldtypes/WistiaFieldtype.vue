<template>
    <div class="wistia_fieldtype_container">
        <div class="flex items-center">
            <div class="input_group">
                <div class="input_group_prepend">URL</div>
                <text-input type="text" id="wistia_url" :value="value" @input="updateDebounced" class="input_text flex-1 bg-white">
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
        };
    },
    mounted() {
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
