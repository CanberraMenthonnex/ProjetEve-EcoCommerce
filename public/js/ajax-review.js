let prdtId = $('#prdtId').val();

function displayReview(res) {

    const content = res.map((item)=> {
        return (`
            <article class="article_avis">

                <h4>${item.firstname} ${item.lastname}</h4>

                <div class="icons_tree">
                    <?php for ($i = 0; $i < ${item.rating}; $i++) { ?>
                    <?php } ?>
                    <h4>${item.rating} / 5 &#x1f384;</h4>
                </div>
                
                <p class="gray">
                    ${item.comment}
                    <span class="reviewDate">${item.date}</span>
                </p>

            </article>
        `)
    })


    $('.avis #review').html(content);


    $(".pagination").click((e)=>{
        e.preventDefault();

        const page = $(e.currentTarget).attr('href');

        $.ajax({
            url: MAIN_PATH + "/product/review/pagination" + prdtId,
            method:"POST",
            data: {page},
            dataType: "json"
        })
        .done((res)=> {
            console.log(res);
            displayReview(res);
        })
        
    })

}


$.ajax({
    url : MAIN_PATH + "/product/review/" + prdtId,
    dataType:"json"
})
.done((res)=> {
    console.log(res);
    displayReview(res);
})