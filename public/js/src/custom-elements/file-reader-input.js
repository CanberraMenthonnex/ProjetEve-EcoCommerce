class FileReaderInput extends HTMLElement {
    constructor() {
        super()
    }

    connectedCallback() {
        this.name = this.getAttribute("name")
        this.classNames = this.getAttribute("class")
        this.baseClassName = this.getAttribute('baseclass')
        this.defaultValue = this.getAttribute("defaultValue")
        this.labelContent = this.innerHTML
        this._generateElement()
        this.input.addEventListener("change", this._onChange.bind(this))
    }

    _generateElement() {
        this.innerHTML = ""
        this.htmlFor = this.name
        this.classList.add("file-reader-input")

        this.span = document.createElement("span")
        this.span.innerHTML = this.defaultValue ? "" :  this.labelContent

        this.label = document.createElement("label")
        this.label.htmlFor = this.name
        this.label.appendChild(this.span)
        this.label.classList.add(this.baseClassName + '--label')

        this.input = document.createElement("input")
        this.input.name = this.name
        this.input.id = this.name
        this.input.type = 'file'
        this.input.classList.add(this.baseClassName  + '--input')

        this.preview = document.createElement('img')
        this.preview.classList.add(this.baseClassName + '--preview')
        this.preview.src = this.defaultValue

        this.label.appendChild(this.preview)
        this.appendChild(this.label)
        this.appendChild(this.input)
    }

    _onChange(e) {
        const input = e.target
        if (!input.files || !input.files[0]) return
        const reader = new FileReader()
        console.log(this.preview)
        reader.onload = (e) => {
            console.log(this)
            this.preview.src = e.target.result
            this.span.innerHTML = ""
        }

        reader.readAsDataURL(input.files[0])
    }
}

customElements.define("file-reader", FileReaderInput)