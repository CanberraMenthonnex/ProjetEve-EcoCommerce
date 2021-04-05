(function () {
    const editorForm = document.querySelector('#editor-form')
    const inputContent = document.querySelector("#article-content")
    const defaultData = inputContent.value ?  JSON.parse(inputContent.value)  : {}
    console.log(defaultData)

    const editor = new EditorJS({
        holder: 'editor',
        autofocus: true,
        tools: {
            header: window.Header,
            image: {
                class: SimpleImage,
                inlineToolbar: ['link'],
            }
        },
        data: defaultData
    });
    


    editorForm.addEventListener('submit', async (e) => {
        const content = await editor.save()
        inputContent.value = JSON.stringify(content)

    })

})()
