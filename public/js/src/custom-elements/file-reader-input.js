class FileReaderInput extends HTMLElement {
    constructor() {
        super()
    }

    connectedCallback() {
        this.name = this.getAttribute("name")
        this.classNames = this.getAttribute("class")
        this.baseClassName = this.getAttribute('baseclass')
        this.labelContent = this.innerHTML
        this._generateElement()
    }

    _generateElement() {
        this.innerHTML = ""
        this.htmlFor = this.name
        this.classList.add("file-reader-input")

        this.label = document.createElement("label")
        this.label.htmlFor = this.name
        this.label.innerHTML = this.labelContent
        this.label.classList.add(this.baseClassName + '--label')

        this.input = document.createElement("input")
        this.input.name = this.name
        this.input.id = this.name
        this.input.type = 'file'
        this.input.classList.add(this.baseClassName  + '--input')

        this.preview = document.createElement('img')
        this.preview.classList.add(this.baseClassName + '--preview')

        this.label.appendChild(this.preview)
        this.appendChild(this.label)
        this.appendChild(this.input)
    }
}

customElements.define("file-reader", FileReaderInput)