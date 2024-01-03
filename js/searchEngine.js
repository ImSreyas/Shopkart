function searchEngine(word, search){
    let backOff = mistake = 0
    word = word.replaceAll(' ', '')
    search = search.replaceAll(' ', '')
    word = word.toLowerCase()
    search = search.toLowerCase()
    for(i=0; i<search.length; i++){
        if(word.includes(search[i], backOff)){
            backOff = word.indexOf(search[i], backOff) + 1
            continue
        }
        if(mistake <= 1){
            mistake++
            continue
        }
        return false
    }
    return true
}