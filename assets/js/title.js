import('jquery');

!(function($) {
/**
 * Affiche un titre mot par mot
 * 
 * @param {*} selector 
 */
function animateTitle(selector) {
    const titleElement = document.querySelector(selector)

        if(titleElement === null) {
            console.log('Impossible de trouver l\'element' + selector)
            return;
        }

    const spans = spanify(titleElement)
    titleElement.style.opacity = 1
        spans.forEach((span, k) => {
          span.children[0].style.animationDelay = (k * .2) + 's'
        })    
}

/**
 * 
 * @param {*} element 
 */
function spanify (element) {
    // On construit un tableau contenant les nouveaux enfants
    const children = Array.from(element.childNodes)
    let spans = [] // Ensemble des spans créées pour l'élément courant
    let elements = [] // Nouveaux enfants
    children.forEach(child => {
      // Si l'élément est un noeud texte, on convertit chaque mot en <span><span></span></span> et on ajoute un espace entre
      if (child.nodeType === Node.TEXT_NODE) {
        const words = child.textContent.split(' ')
        let wordSpans = words.map(wrapWord)
        spans = spans.concat(wordSpans)
        elements = elements.concat(
          injectElementBetweenItems(wordSpans, document.createTextNode(' '))
        )
      } else if (child.tagName === 'BR') {
        // Si l'élément est un <br> on ne fait rien c'est une balise qui n'a pas de contenu 
        elements.push(child)
      } else {
        // On parcourt récursivement les enfants pour ajouter des spans dans les balises imbriquées
        spans = spans.concat(spanify(child))
        elements.push(child)
      }
    })
  
    // On utilise le tableau pour injecter les éléments dans titre
    element.innerHTML = ''
    elements.forEach(el => {
      element.appendChild(el)
    })
    return spans
  }

  /**
   * 
   * @param {*} word 
   */
  function wrapWord (word) {
    const span = document.createElement('span')
    const span2 = document.createElement('span')
    span.appendChild(span2)
    span2.innerHTML = word
    return span
  }

  /**
   * 
   * @param {*} arr 
   * @param {*} element 
   */
  function injectElementBetweenItems (arr, element) {
    return arr.map((item, k) => {
      if (k === arr.length - 1) {
        return [item]
      }
      return [item, element.cloneNode()]
    }).reduce((acc, pair) => {
      acc = acc.concat(pair)
      return acc
    }, [])
  }
  
  animateTitle('.titleElement')
})(jQuery);