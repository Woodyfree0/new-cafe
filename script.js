function addMenuItem() {
    const newItemName = document.getElementById('newItemName').value;
    const newItemDescription = document.getElementById('newItemDescription').value;
    const newItemPrice = document.getElementById('newItemPrice').value;
  
    if (newItemName && newItemDescription && newItemPrice) {
      const menuContainer = document.querySelector('.menu-container');
  
      const newItem = document.createElement('div');
      newItem.classList.add('menu-item');
  
      const nameElement = document.createElement('div');
      nameElement.classList.add('item-name');
      nameElement.textContent = newItemName;
  
      const descriptionElement = document.createElement('div');
      descriptionElement.classList.add('item-description');
      descriptionElement.textContent = newItemDescription;
  
      const priceElement = document.createElement('div');
      priceElement.classList.add('item-price');
      priceElement.textContent = '$' + newItemPrice;
  
      newItem.appendChild(nameElement);
      newItem.appendChild(descriptionElement);
      newItem.appendChild(priceElement);
  
      menuContainer.appendChild(newItem);
  
      // Clear input fields
      document.getElementById('newItemName').value = '';
      document.getElementById('newItemDescription').value = '';
      document.getElementById('newItemPrice').value = '';
    }
  }
  

  function ConfirmRes{
    onclick

    )
  }