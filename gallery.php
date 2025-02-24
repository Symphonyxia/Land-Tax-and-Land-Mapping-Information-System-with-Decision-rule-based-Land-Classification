<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<style>
  .folder-container {
    display: inline-block;
    margin-right: 10px;
    text-align: center;
  }

  .folder-icon {
    display: inline-block;
    width: 98px;
    height: 98px;
    background-image: url('https://img.icons8.com/emoji/96/file-folder-emoji.png');
    background-size: contain;
    background-repeat: no-repeat;
    cursor: pointer;
  }

  .folder-icon:hover {
    opacity: 0.7;
  }

  .folder-name {
    margin-top: 5px;
  }
</style>

<div id="folderContainer">
  <form method="POST" id="createFolderForm">
    <label for="folderName">Folder Name:</label>
    <input type="text" name="folderName" required>
    <button type="button" id="createFolderButton">Create Folder</button>
  </form>
</div>

<script>
 let folders = []; // Initialize the folders array

window.addEventListener('DOMContentLoaded', function () {
    fetchExistingFolders();
});

const createFolderButton = document.getElementById('createFolderButton');
createFolderButton.addEventListener('click', function () {
    createNewFolder();
});

function fetchExistingFolders() {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'fetch_folders.php', true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            folders = JSON.parse(xhr.responseText);
            populateExistingFolders(folders);
        } else {
            console.error('An error occurred while fetching existing folders');
        }
    };
    xhr.send();
}

function populateExistingFolders(folders) {
    const folderContainer = document.getElementById('folderContainer');

    for (const folder of folders) {
        const folderId = folder.folder_id;
        const folderName = folder.folder_name;

        const folderElement = createFolderElement(folderId, folderName);
        folderContainer.appendChild(folderElement);
    }
}

  function createFolderElement(folderId, folderName) {
    const folderContainer = document.createElement('div');
    folderContainer.className = 'folder-container';

    const folderCheckbox = document.createElement('input');
    folderCheckbox.type = 'checkbox'; // Add a checkbox
    folderCheckbox.name = 'folderToDelete[]';
    folderCheckbox.value = folderId;
    folderCheckbox.style.display = 'none'; // Hide the checkbox


    const folderIcon = document.createElement('div');
    folderIcon.className = 'folder-icon';

    const folderNameContainer = document.createElement('div');

    const folderNameSpan = document.createElement('span');
    folderNameSpan.className = 'folder-name';
    folderNameSpan.textContent = folderName;

    const folderDeleteButton = document.createElement('button');
    folderDeleteButton.type = 'button';
    folderDeleteButton.textContent = 'Delete';
    folderDeleteButton.addEventListener('click', function () {
      deleteFolder(folderId, folderName);
    });

    folderContainer.appendChild(folderCheckbox);
    folderContainer.appendChild(folderIcon);
    folderNameContainer.appendChild(folderNameSpan);
    folderContainer.appendChild(folderNameContainer);
    folderContainer.appendChild(folderDeleteButton);

    folderIcon.onclick = function () {
      openUploadPage(folderId, folderName);
    };

    return folderContainer;
  }

  function deleteFolder(folderId, folderName) {
    const confirmed = confirm(`Are you sure you want to delete the folder "${folderName}"?`);
    if (!confirmed) {
      return;
    }

    // Send an AJAX request to delete the folder from the database
    const xhrDeleteFolder = new XMLHttpRequest();
    xhrDeleteFolder.open('POST', 'delete_folder.php', true);
    xhrDeleteFolder.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhrDeleteFolder.onload = function () {
      if (xhrDeleteFolder.status === 200) {
        try {
          const response = JSON.parse(xhrDeleteFolder.responseText);
          if (response.success) {
            removeFolderFromUI(folderId); // Remove the folder from the UI
          } else {
            console.error('Folder deletion failed:', response.message);
          }
        } catch (error) {
          console.error('Error parsing response:', error);
        }
      } else {
        console.error('An error occurred while deleting the folder:', xhrDeleteFolder.status);
      }
    };
    xhrDeleteFolder.onerror = function () {
      console.error('Network error occurred');
    };
    xhrDeleteFolder.send('folderId=' + encodeURIComponent(folderId));
  }

  function removeFolderFromUI(folderId) {
    // Remove the folder from the UI by its folderId
    const folderElement = document.querySelector(`.folder-container input[value="${folderId}"]`);
    if (folderElement) {
      folderElement.parentElement.remove();
    }
  }



function createNewFolder() {
    const folderNameInput = document.querySelector('input[name="folderName"]');
    const folderName = folderNameInput.value;

    // Check for duplicate folder name on the client side
    if (folders.some(folder => folder.folder_name === folderName)) {
        console.error('Folder with the same name already exists.');
        return;
    }

    createFolderButton.disabled = true;

    const xhrCreateFolder = new XMLHttpRequest();
    xhrCreateFolder.open('POST', 'create_folder.php', true);
    xhrCreateFolder.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhrCreateFolder.onload = function () {
        createFolderButton.disabled = false;
        if (xhrCreateFolder.status === 200) {
            try {
                const response = JSON.parse(xhrCreateFolder.responseText);
                if (response.success) {
                    // Check if the folder already exists in the client-side array
                    const existingFolder = folders.find(folder => folder.folder_id === response.folder_id);
                    if (!existingFolder) {
                        // Update the client-side folder array
                        folders.push({ folder_id: response.folder_id, folder_name: folderName });
                        // Append the new folder to the existing container
                        const folderContainer = document.getElementById('folderContainer');
                        const newFolderElement = createFolderElement(response.folder_id, folderName);
                        folderContainer.appendChild(newFolderElement);
                    }
                } else {
                    console.error('Folder creation failed:', response.message);
                }
            } catch (error) {
                console.error('Error parsing response:', error);
            }
        } else {
            console.error('An error occurred while creating the folder:', xhrCreateFolder.status);
        }
    };
    xhrCreateFolder.onerror = function () {
        console.error('Network error occurred');
        createFolderButton.disabled = false;
    };
    xhrCreateFolder.send('folderName=' + encodeURIComponent(folderName));
}

  function updateFolderList() {
    const folderContainer = document.getElementById('folderContainer');
    folderContainer.innerHTML = '';
    populateExistingFolders(folders);
  }

  function openUploadPage(folderId, folderName) {
    window.location.href = `upload.php?folder_id=${encodeURIComponent(folderId)}&folder_name=${encodeURIComponent(folderName)}`;
  }
</script>

<?php
include('includes/scripts.php');
?>