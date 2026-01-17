from fastapi import FastAPI, Request, HTTPException
from fastapi.middleware.cors import CORSMiddleware
from fastapi.responses import JSONResponse

app = FastAPI()

# CORS headers matching your PHP
app.add_middleware(
    CORSMiddleware,
    allow_origins=["*"],
    allow_methods=["POST"],
    allow_headers=["Content-Type"],
)

replies = {
    'f1': 'F1 visa: Apply via US embassy. I-20 from university required. Interview tips in playlist.',
    'opt': 'OPT: Post-F1 work auth. STEM=36mo. Apply USCIS 90 days pre-completion.',
    'cpt': 'CPT: Curricular Practical Training. Part-time OK during studies. Employer letter needed.',
    'express entry': 'Express Entry: CRS score 470+. Profile → ITA → PR in 6mo.',
    'pn p': 'PNP: Provincial Nominee. Alberta AAIP, SINP streams. Faster than EE.',
    'visa': 'US/Canada visas? Check playlist for forms (DS-160, IMM5669).'
}

@app.api_route("/chat", methods=["POST"])
async def chat_endpoint(request: Request):
    if request.method != "POST":
        raise HTTPException(status_code=405, detail="POST only")

    try:
        input_data = await request.json()
        message = (input_data.get('message') or '').lower()
        print(f"Chat input: {input_data}")  # Server log

        reply = 'Ask about F1, OPT, CPT, Express Entry, PNP, or visas!'
        for key, response in replies.items():
            if key in message:
                reply = response
                break

        return JSONResponse(content={'response': reply})
    except Exception:
        raise HTTPException(status_code=400, detail="Invalid JSON input")