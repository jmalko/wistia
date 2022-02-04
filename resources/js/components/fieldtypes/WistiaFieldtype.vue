<template>
    <div>
        <div id="wistia_uploader" style="height:360px;"></div>
        <text-input id="wistia_url" type="text" :value="value" @input="updateDebounced" />
    </div>
</template>
 
<script>
export default {
    mixins: [Fieldtype],
    data() {
        return {
        };
    },
    computed() {

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
                console.log("The video is now embeddable!");
                console.log("Here's the original file: ", file);
                console.log("Here's the media in Wistia: ", media);
                console.log("Here's an embed code: ", embedCode);
                console.log("And here's the full oEmbed response (see https://wistia.com/doc/oembed): ", oembedResponse);
                //saveEmbedCode(embedCode); // save the embed code to your database to display the video in the future
                this.updateDebounced(media.url);
            });

        });
    }
};
</script>