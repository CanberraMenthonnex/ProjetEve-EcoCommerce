const prdtId = document.querySelector("#prdtId")?.value;
const reviewContainer = document.querySelector("#review");
const paginationsBtn = document.querySelectorAll(".pagination")

paginationsBtn[0].style.color = "#565656"

function displayReview(res) {

    const content = res.map((item)=> {
        let rate = "";
        for(let i=0; i < 5; i++) {
            rate += 
            `
            <svg  viewBox="0 0 29.801 39.737" class="comment-area--tree ${item.rating <= i ? "comment-area--tree-unselected" : "comment-area--tree--bright"}">
            <path id="Icon_awesome-tree" data-name="Icon awesome-tree" d="M29.36,29.374l-6.2-7.023h2.377a1.763,1.763,0,0,0,1.613-1.014,1.711,1.711,0,0,0-.255-1.866l-6.064-7.054h2.242a1.758,1.758,0,0,0,1.619-1.056,1.727,1.727,0,0,0-.329-1.869L15.806.375a1.278,1.278,0,0,0-1.81,0L5.437,9.492a1.728,1.728,0,0,0-.329,1.869,1.76,1.76,0,0,0,1.62,1.056H8.97L2.906,19.473a1.713,1.713,0,0,0-.254,1.866,1.763,1.763,0,0,0,1.613,1.013H6.642l-6.2,7.023a1.716,1.716,0,0,0-.276,1.883A1.8,1.8,0,0,0,1.8,32.285H12.417v1.9l-2.351,3.756a1.242,1.242,0,0,0,1.111,1.8h7.447a1.242,1.242,0,0,0,1.111-1.8l-2.351-3.756v-1.9H28.006a1.8,1.8,0,0,0,1.631-1.028A1.716,1.716,0,0,0,29.36,29.374Z" transform="translate(0 0.001)" fill="#e7df00"/>
            </svg>
            
            `;

        }

        return (`
            <article class="comment-area">
                
                <div class='comment-area--user'>
                    ${item.firstname} ${item.lastname}
                </div>
        
                <div class="comment-area--trees-wrapper">
                ${rate}
                    
                </div>

                <p class="comment-area--content">
                    ${item.comment}
                    <span class="comment-area--date">${item.date}</span>
                </p>

            </article> 
        `)
    });


    reviewContainer.innerHTML = content;
    

}


paginationsBtn.forEach((pagination) => {

    pagination.addEventListener("click", ((e)=>{
        e.preventDefault();

        paginationsBtn.forEach(item => item.style.color = "white" )
        e.target.style.color = "#565656"
        const page = e.target.getAttribute("href");

        fetch( MAIN_PATH + "/product/review/" + prdtId + "?offset=" + page,{
            method:"GET",
        })
            .then(res => res.json())
            .then((res)=> {
                displayReview(res);
            })

    }))

})


fetch(MAIN_PATH + "/product/review/" + prdtId, {
    method: "GET",
    headers : {
        "Accept" : "application/json"
    }
})
    .then(res => res.json())
    .then((res)=> {
        console.log(res);
        displayReview(res);
    });




