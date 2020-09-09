const express = require('express')
const nunjucks = require('nunjucks')


const server = express()
const perfis = require("./data")

server.use(express.static('puplic'))

server.set('view engine', 'njk')

nunjucks.configure("views", {
    express:server,
    autoescape: false,
    noCache: true
})

server.get("/inicio", function(req, res){
    const choose = {
        desc: "Encontre novos jogadores para montar um time e faça novos amigos!",
        escolha: "Escolha um jogo:",
        games: [
            {
                route: "/cs:go",
                gameImage: "https://upload.wikimedia.org/wikipedia/pt/c/ce/Counter-Strike_Global_Offensive.jpg",
                gameName: "CS:GO"
            },

            {   route: "/rainbowsix",
                gameImage: "https://http2.mlstatic.com/tom-clancys-rainbow-six-siege-original-steam-D_NQ_NP_682910-MLB29663081788_032019-F.jpg",
                gameName: "Rainbow Six"
            },

            {   route: "/fortnite",
                gameImage: "https://img.ibxk.com.br/2018/04/27/27162254680256.jpg",
                gameName: "Fortnite"
            },

            {   route: "/lol",
                gameImage: "https://www.xaimer.com.br/arquivos/PRODUTOS/5501581998181487686/56_G_Riot-Points-League-Of-Legends.jpg",
                gameName: "League of Legends"
            },
            
            {   route: "/cod",
                gameImage: "https://imag.malavida.com/mvimgbig/download-fs/call-of-duty-warzone-26418-0.jpg",
                gameName: "COD: Warzone"
            },
            {
                gameImage: "https://images-na.ssl-images-amazon.com/images/I/71lamwcnkYL.jpg",
                gameName: "World of Warcraft"
            }

        ]

        }
    
        return res.render("inicio", {imgs: choose})
})








server.get("/cs:go", function(req, res){

    return res.render("profilesCS", {items: perfis})
})

server.get("/rainbowsix", function(req, res){
    return res.render("profilesR6", {items: perfis})
})

server.get("/cod", function(req,res){
    return res.render("profilesCOD", {items: perfis})
})

server.get("/fortnite", function(req,res){
    return res.render("profilesFORT", {items: perfis})
})
server.get("/lol", function(req,res){
    return res.render("profilesLOL", {items: perfis})
})
server.get("/amigos", function(req,res){
    return res.render("amigos")
})
server.get("/codin2", function(req,res){
    return res.render("codin2")
})





server.get("/sobre", function(req, res){
    return res.render("sobre")
})

server.get("/ajuda", function(req, res){
    return res.render("ajuda")
})

server.get("/lider", function(req,res){
    return res.render("lider", {items: perfis})
})

server.get("/", function(req, res){
    return res.render("index")
})

server.get("/formulario", function(req, res){
    return res.render("form", {saved: false})
})


server.listen(5000, function(){
    console.log('server is running')
})

