from fastapi import FastAPI
from fastapi.staticfiles import StaticFiles
from fastapi.responses import FileResponse
from fastapi.middleware.cors import CORSMiddleware
from fastapi import Request

app = FastAPI()
app.add_middleware(CORSMiddleware, allow_origins=["*"])

# Serve React build (after npm run build)
app.mount("/static", StaticFiles(directory="build/static"), name="static")

# Catch-all for React routes (SPA)
@app.get("/{catch_all:path}")
async def serve_react():
    return FileResponse("build/index.html")

# Your /chat API
@app.post("/chat")
async def chat(request: Request):
    data = await request.json()
    message = data.get('message', '').lower()
    replies = { 'cpt': 'CPT details...', 'f1': 'F1 visa...' }  # Your dict
    reply = replies.get(message, 'Default reply')
    return {'response': reply}  # Matches JS

