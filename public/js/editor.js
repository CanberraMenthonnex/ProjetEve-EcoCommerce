(function () {


    const editor = new EditorJS({
        holder: 'editor',
        autofocus: true,
        tools: {
            header: window.Header,
            image: {
                class: SimpleImage,
                inlineToolbar: ['link'],
            }
        }
    });
    console.log("test");
})()
