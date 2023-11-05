let id;

document.addEventListener("DOMContentLoaded", () => {
    let descriptions = document.querySelectorAll(".description");
    let titles = document.querySelectorAll(".card-title");
    titles.forEach((title) => {
        if (title.textContent.length > 20) {
            title.textContent = title.textContent.substring(0, 20) + "...";
        }
    });
    descriptions.forEach((description) => {
        if (description.textContent.length > 91.8) {
            description.textContent = description.textContent.substring(0, 91.8) + "...";
        }
    });
});

document.querySelector("#addTask").addEventListener("click", () => {
    const task = document.querySelector("#notetext").value;
    const title = document.querySelector("#taskTitle").value;
    if (task){
        location.assign("php's/create.php?title=" + title + "&task=" + task);
    }
});

document.getElementById('updateModal').addEventListener('show.bs.modal', (e) => {
    id = (e.relatedTarget.dataset.id);
});

document.querySelector("#updateTaskBttn").addEventListener("click", () => {
    const title = document.querySelector("#updateTaskTitle").value;
    const task = document.querySelector("#updateTaskDescription").value;
    if (task){
        location.assign("php's/update.php?id=" + id + "&title=" + title + "&task=" + task);
    }
});